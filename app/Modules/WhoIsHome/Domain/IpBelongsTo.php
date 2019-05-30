<?php

namespace App\Modules\WhoIsHome\Domain;

use Illuminate\Database\Eloquent\Model;

class IpBelongsTo extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'ip', 'belongs-to', 'created_at', 'updated_at'
	];

	public $timestamps = true;

	protected $table = 'ip-belongs-to-table';

}
