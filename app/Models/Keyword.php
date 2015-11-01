<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Keyword extends Model
	{
		protected $table = "keywords";

		protected $fillable = ['word'];

		protected $hidden = [
			'created_at',
			'updated_at',
		];
	}
