<?php

namespace App\Modules\WhoIsHome\Domain;

use Illuminate\Database\Eloquent\Model;

class IsHome extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'ip', 'is-home', 'created_at', 'updated_at'
	];

	public $timestamps = true;

	protected $table = 'who-is-home';

}
