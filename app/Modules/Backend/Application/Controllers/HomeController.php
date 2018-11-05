<?php

namespace App\Modules\Backend\Application\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

	public function index() {
		return view('Backend::home');
	}
}