<?php

namespace App\Modules\SocialMedia\Domain;

use Illuminate\Database\Eloquent\Model;

class SocialMediaAccount extends Model
{
    //
	protected $primaryKey = 'id';

	protected $fillable = ['url', 'name', 'user_id'];

	public $timestamps = false;

	public function getUrl() {
		return $this->url;
	}

	/**
	 * Get the social media accounts associated with the user.
	 */
	public function UserCount()
	{
		return $this->hasMany('App\Modules\SocialMedia\Domain\SocialMediaUserCount', 'account_id');
	}

	/**
	 * Get the latest count we have.
	 */
	public function getLatestCount()
	{
		return $this->userCount->sortByDesc('updated_at')->first()->count;
	}
}
