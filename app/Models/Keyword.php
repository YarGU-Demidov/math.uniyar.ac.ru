<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * App\Models\Keyword
	 *
	 * @property integer $id
	 * @property string $word
	 * @property \Carbon\Carbon $created_at
	 * @property \Carbon\Carbon $updated_at
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Keyword whereId($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Keyword whereWord($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Keyword whereCreatedAt($value)
	 * @method static \Illuminate\Database\Query\Builder|\App\Models\Keyword whereUpdatedAt($value)
	 */
	class Keyword extends Model
	{
		protected $table = "keywords";

		protected $fillable = ['word'];

		protected $hidden = [
			'created_at',
			'updated_at',
		];

		public function news()
		{
			return $this->belongsToMany(\App\Models\News::class, 'news_keywords', 'news_id');
		}

		public function scopeWithNews($query, $newsId)
		{
			$query->whereHas('news', function ($q) use ($newsId)
			{
				$q->where('news_id', $newsId);
			});
		}

		public function setNewsIdAttribute($newsId)
		{
			$this->save();
			$news = News::find($newsId);
			$this->news()->attach($news);
		}
	}
