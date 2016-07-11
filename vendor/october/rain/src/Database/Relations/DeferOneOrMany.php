<?php namespace October\Rain\Database\Relations;

use October\Rain\Support\Facades\DbDongle;
use Illuminate\Database\Eloquent\Relations\BelongsToMany as BelongsToManyBase;

trait DeferOneOrMany
{
    /**
     * Returns the model query with deferred bindings added
     */
    public function withDeferred($sessionKey)
    {
        $modelQuery = $this->query;

        $newQuery = $modelQuery->getQuery()->newQuery();

        $newQuery->from($this->related->getTable());

        /*
         * No join table will be used, strip the selected "pivot_" columns
         */
        if ($this instanceof BelongsToManyBase) {
            $this->orphanMode = true;
        }

        $newQuery->where(function($query) use ($sessionKey) {

            if ($this->parent->exists) {
                if ($this instanceof BelongsToManyBase) {
                    /*
                     * Custom query for BelongsToManyBase since a "join" cannot be used
                     */
                    $query->whereExists(function($query) {
                        $query->from($this->table)
                            ->whereRaw(DbDongle::cast($this->getOtherKey(), 'INTEGER').' = '.DbDongle::getTablePrefix().$this->related->getQualifiedKeyName())
                            ->where($this->getForeignKey(), $this->parent->getKey());
                    });
                }
                else {
                    /*
                     * Trick the relation to add constraints to this nested query
                     */
                    $this->query = $query;
                    $this->addConstraints();
                }
            }

            /*
             * Bind (Add)
             */
            $query = $query->orWhereExists(function($query) use ($sessionKey) {
                $query->from('deferred_bindings')
                    ->whereRaw(DbDongle::cast('slave_id', 'INTEGER').' = '.DbDongle::getTablePrefix().$this->related->getQualifiedKeyName())
                    ->where('master_field', $this->relationName)
                    ->where('master_type', get_class($this->parent))
                    ->where('session_key', $sessionKey)
                    ->where('is_bind', 1);
            });
        });

        /*
         * Unbind (Remove)
         */
        $newQuery->whereNotExists(function($query) use ($sessionKey) {
            $query->from('deferred_bindings')
                ->whereRaw(DbDongle::cast('slave_id', 'INTEGER').' = '.DbDongle::getTablePrefix().$this->related->getQualifiedKeyName())
                ->where('master_field', $this->relationName)
                ->where('master_type', get_class($this->parent))
                ->where('session_key', $sessionKey)
                ->where('is_bind', 0)
                ->whereRaw(DbDongle::parse('id > ifnull((select max(id) from '.DbDongle::getTablePrefix().'deferred_bindings where
                        '.DbDongle::cast('slave_id', 'INTEGER').' = '.DbDongle::getTablePrefix().$this->related->getQualifiedKeyName().' and
                        master_field = ? and
                        master_type = ? and
                        session_key = ? and
                        is_bind = ?
                    ), 0)'), [
                    $this->relationName,
                    get_class($this->parent),
                    $sessionKey,
                    1
                ]);
        });

        $modelQuery->setQuery($newQuery);

        $modelQuery = $this->related->applyGlobalScopes($modelQuery);

        return $this->query = $modelQuery;
    }
}
