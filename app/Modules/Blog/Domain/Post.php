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
		'author_id', 'created_at', 'updated_at', 'public', 'title', 'content'
	];


	/**
	 * The "booting" method of the model.
	 *
	 * @return void
	 */
	protected static function boot()
	{
		parent::boot();

		static::addGlobalScope(new PublicScope);
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
		return self::OrderByCreatedDate()->take($howMany)->get();
	}

	/**
	 * Get the phone record associated with the user.
	 */
	public function author()
	{
		return $this->belongsTo('App\User', 'author_id', 'id');
	}

}
