<?php

	namespace App;

	use App\Models\Category;
	use App\Models\User;
	use Illuminate\Database\Eloquent\Model;

	class News extends Model
	{
		protected $table = "news";
		
		protected $fillable = [
			'title',
			'author_id',
			'image',
			'announce',
			'text',
			'category_id',
			'short_url',
		];

		protected $hidden = [
			'created_at',
			'updated_at',
		];

		public function author()
		{
			return $this->hasOne(User::class);
		}

		public function category()
		{
			return $this->hasOne(Category::class);
		}
	}
