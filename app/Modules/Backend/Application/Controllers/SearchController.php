<?php

namespace App\Modules\Backend\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use stdClass;

class SearchController extends Controller {

	public function search($searchCriteria) {
		$routes = collect(Route::getRoutes())
		->map(function ($route) {
			return $route->uri();
		});
		$foundRoutes = new Collection();
		foreach($routes as $route) {
			$searchPattern = '*'. $searchCriteria .'*';
			if ($this->match_wildcard($searchPattern, $route)) {
				$obj = new stdClass();
				$obj->type = 'route';
				$obj->url = $route;
				$foundRoutes->push($obj);
			}
		}
		return json_encode($foundRoutes);
	}
	
	function match_wildcard( $wildcard_pattern, $haystack ) {
		$regex = str_replace(
			array("\*", "\?"), // wildcard chars
			array('.*','.'),   // regexp chars
			preg_quote($wildcard_pattern)
		);
		
		return preg_match('/^'.$regex.'$/is', $haystack);
	}
}

