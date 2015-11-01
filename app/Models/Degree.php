<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use SleepingOwl\Admin\Traits\OrderableModel;

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
	 * @property integer $order
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Degree whereOrder($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Degree orderModel()
	 */
	class Degree extends Model
	{
		use OrderableModel;

		protected $table = "degrees";

		protected $fillable = ['name'];

		protected $hidden = [
			'created_at',
			'updated_at',
			'order'
		];

		public function getOrderField()
		{
			return 'order';
		}
	}
