<?php

namespace App\Modules\People\Domain;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'birthday'
	];
}
