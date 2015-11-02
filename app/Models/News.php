<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * App\Models\News
	 *
	 * @property integer $id
	 * @property string $title
	 * @property integer $author_id
	 * @property string $image
	 * @property string $announce
	 * @property string $text
	 * @property integer $category_id
	 * @property string $short_url
	 * @property \Carbon\Carbon $created_at
	 * @property \Carbon\Carbon $updated_at
	 * @property-read User $author
	 * @property-read Category $category
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereId($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereTitle($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereAuthorId($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereImage($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereAnnounce($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereText($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereCategoryId($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereShortUrl($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereCreatedAt($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\News whereUpdatedAt($value)
	 */
	class News extends Model
	{
		protected $table = "news";

		protected $fillable = [
			'title',
			'author',
			'image',
			'announce',
			'text',
			'category',
			'short_url',
		];

		protected $hidden = [
			'created_at',
			'updated_at',
		];

		public function author()
		{
			return $this->belongsTo(\App\Models\User::class);
		}

		public function category()
		{
			return $this->belongsTo(\App\Models\Category::class);
		}
	}
