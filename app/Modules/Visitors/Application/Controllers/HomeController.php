<?php

namespace App\Modules\Visitors\Application\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	public function index() {
		return view('Visitors::home');
	}
}