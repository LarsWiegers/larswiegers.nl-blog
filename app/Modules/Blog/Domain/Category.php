<?php

namespace App\Modules\Blog\Domain;
use App\Modules\Blog\Domain\PublicScope;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'created_at', 'updated_at', 'public', 'title', 'description' , 'slug'
	];

	protected $attributes = [
		'public' => 0 // default is false
	];

	protected $table = 'categories';

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

	public function scopePublic($query)
	{
		return $query->where('public', '=', true);
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
	 * Get the posts record associated with the category.
	 */
	public function posts()
	{
		return $this->hasMany('App\Modules\Blog\Domain\Post', 'category_id', 'id');
	}

}
