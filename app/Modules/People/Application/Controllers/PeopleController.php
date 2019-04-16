<?php

namespace App\Modules\People\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller {

	public function index() {

		return view( 'People::index');
	}
}
