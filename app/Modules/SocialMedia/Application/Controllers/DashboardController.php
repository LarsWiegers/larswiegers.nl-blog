<?php

namespace App\Modules\SocialMedia\Application\Controllers;

use App\Charts\DefaultChart;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
	public function index () {

		if(!count(Auth::user()->socialMediaAccounts)) {
			return view('SocialMedia::dashboard',['chart' => null]);
		}
		$chart = (new DefaultChart())
		->width(400)
		->height(400);

		$labels = new Collection();
		forEach(Auth::user()->socialMediaAccounts as $mediaAccount) {
			$collection = new Collection();
			$labels = new Collection();
			forEach($mediaAccount->UserCount as $socialMediaUserCount) {
				$collection->push( $socialMediaUserCount->count );
				$labels->push($socialMediaUserCount->updated_at->toDateString());
			}
			$chart->labels($labels->toArray());
			$chart->dataset($mediaAccount->accountType->name, 'line', $collection->toArray())
			->color($mediaAccount->accountType->color)
			->backgroundColor($mediaAccount->accountType->color)
			->fill(false);
		}

		return view('SocialMedia::dashboard',[
			'chart' => $chart,
			'accounts' => Auth::user()->socialMediaAccounts
		]);
	}
}