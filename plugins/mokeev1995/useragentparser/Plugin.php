<?php namespace mokeev1995\UserAgentParser;

use App;
use BackendAuth;
use Illuminate\Foundation\AliasLoader;
use System\Classes\PluginBase;

/**
 * UserAgent Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'User Agent Parser',
            'description' => 'Simple user agent detection for OctoberCMS.',
            'author'      => 'Mokeev Andrey',
            'icon'        => 'icon-search'
        ];
    }

    /**
     * Register service provider and alias
     */
    public function boot()
    {
        App::register('\Jenssegers\Agent\AgentServiceProvider');

        $alias = AliasLoader::getInstance();
        $alias->alias('Agent', 'Jenssegers\Agent\Facades\Agent');
    }

    /**
     * Register twig extension
     */
    public function registerMarkupTags()
    {
        $agent = $this->app['agent'];

        return [
            'functions' => [
                'agent' => function($option) use ($agent) {
                    return $agent->$option();
                },
	            'betaAccess' => function(){
		            $user = BackendAuth::getUser();
                	return $user != null && $user->is_superuser;
	            }
            ]
        ];
    }


}
