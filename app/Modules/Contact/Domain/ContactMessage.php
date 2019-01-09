<?php

namespace App\Modules\Contact\Domain;
use App\Modules\Blog\Domain\PublicScope;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'created_at', 'updated_at', 'name', 'email', 'text'
	];

}
