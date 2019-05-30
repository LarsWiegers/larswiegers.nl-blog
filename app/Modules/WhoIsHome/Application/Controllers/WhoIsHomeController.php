<?php

namespace App\Modules\WhoIsHome\Application\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\WhoIsHome\Domain\IsHome;
use Illuminate\Http\Request;

class WhoIsHomeController extends Controller {

	public function index(Request $request) {
	    $ip = $request->get('ip');
	    $isHome = $request->get('is-home') === 'true' ? true : false;
	    IsHome::create([
	        'ip' => $ip,
            'is-home' => $isHome
        ]);

        return response()->json([], 200);
	}
}
