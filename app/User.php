<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * Get the phone record associated with the user.
	 */
	public function posts()
	{
		return $this->hasMany('App\Modules\Blog\Application\Post');
	}

	/**
	 * Get the social media accounts associated with the user.
	 */
	public function socialMediaAccounts()
	{
		return $this->hasMany('App\Modules\SocialMedia\Domain\SocialMediaAccount');
	}
}
