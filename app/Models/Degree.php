<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * App\Models\Degree
	 *
	 * @property integer $id
	 * @property integer $name
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Degree whereId($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Degree whereName($value)
	 */
	class Degree extends Model
	{
		protected $table = "degree";
	}
