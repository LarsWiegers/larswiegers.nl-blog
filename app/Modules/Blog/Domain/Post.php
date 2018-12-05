<?php

namespace App\Modules\Blog\Domain;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'author_id', 'created_at', 'updated_at', 'public', 'title', 'content', 'slug'
	];

	protected $attributes = [
		'public' => 0 // default is not public
	];

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'slug';
	}

	/**
	 * The "booting" method of the model.
	 *
	 * @return void
	 */
	protected static function boot()
	{
		parent::boot();
	}

	/**
	 * Scope a query to only include popular users.
	 *
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeOrderByCreatedDate($query)
	{
		return $query->orderBy('created_at');
	}

	public static function getLatest(int $howMany) {
		return self::OrderByCreatedDate()->take($howMany)->public()->get();
	}

	/**
	 * @param $query
	 *
	 * @return mixed
	 */
	public function scopePublic($query)
	{
		return $query->where('public', '=', true);
	}

	/**
	 * Get the author who wrote the post.
	 */
	public function author()
	{
		return $this->belongsTo('App\User', 'author_id', 'id');
	}

	/**
	 * Get the short version of a post's content.
	 *
	 * @return string
	 */
	public function getShortContent()
	{
		if($this->content) {
			return str_limit($this->content, $limit = 100, $end = '...');
		}
		return '';
	}

}
