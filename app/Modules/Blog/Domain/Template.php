<?php

namespace App\Modules\Blog\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class Template extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'path', 'title'
	];


	public $timestamps = false;

	protected $table = 'templates';

	protected static function getPaths() {
		return new Collection(File::allFiles(__DIR__ . "/../Presentation/Views/templates/"));
	}

}
