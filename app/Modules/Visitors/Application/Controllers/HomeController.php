<?php

namespace App\Modules\Visitors\Application\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Visitors\Domain\Visitor;

class HomeController extends Controller {

	public function index() {
		$allToday = Visitor::allToday();
		$allMonth = Visitor::allMonth();
		$allYear  = Visitor::allYear();

		$previousToday = Visitor::allYesterday();
		$previousMonth = Visitor::allPreviousMonth();
		$previousYear = Visitor::allPreviousYear();


		return view('Visitors::home', [
				'allToday' => count($allToday),
				'allMonth' => count($allMonth),
				'allYear' => count($allYear),
				'previousToday' => count($previousToday),
				'previousMonth' => count($previousMonth),
				'previousYear' => count($previousYear),
			]);
	}
}