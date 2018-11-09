<?php

namespace App\Modules\SocialMedia\Domain;

use Illuminate\Database\Eloquent\Model;

class SocialMediaUserCount extends Model
{
	protected $fillable = ['account_id', 'count'];
}
