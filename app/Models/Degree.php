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
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Degree whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Degree whereUpdatedAt($value)
 */
	class Degree extends Model
	{
		protected $table = "degree";
	}
