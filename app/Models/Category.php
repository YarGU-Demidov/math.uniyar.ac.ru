<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * App\Models\Category
	 *
	 * @property integer $id
	 * @property string $name
	 * @property \Carbon\Carbon $created_at
	 * @property \Carbon\Carbon $updated_at
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereId($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereName($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereCreatedAt($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereUpdatedAt($value)
	 */
	class Category extends Model
	{
		protected $table = "categories";

		protected $fillable = ['name'];

		protected $hidden = [
			'created_at',
			'updated_at',
		];
	}
