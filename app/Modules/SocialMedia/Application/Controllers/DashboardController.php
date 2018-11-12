<?php

namespace App\Modules\SocialMedia\Application\Controllers;

use App\Charts\DefaultChart;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
	public function index () {
		$colors = [];
		foreach(Auth::user()->socialMediaAccounts as $mediaAccount) {
			$colors[] = $mediaAccount->accountType->color;
		}

		if(count(Auth::user()->socialMediaAccounts)) {
			$chart = new DefaultChart();
			$chart
				->width(400)
				->height(400);
			$dataSets = new Collection();
			$labels = [];
			$xLabels = [];
			forEach(Auth::user()->socialMediaAccounts as $mediaAccount) {
				$collection = new Collection();
				forEach($mediaAccount->UserCount as $socialMediaUserCount) {
					$collection->push($socialMediaUserCount->count);
					$xLabels[] = $socialMediaUserCount->created_at->format('m/d/Y');
				}
				$labels[] = $mediaAccount->accountType->name;
				$dataSets->push($collection);
			}
			foreach($dataSets as $index => $data) {
				$chart->dataset($labels[$index], 'line', $data)
				      ->color($colors[$index])
				      ->backgroundColor($colors[$index])
				      ->fill(false);
			}
			$chart->labels($xLabels);

			return view('SocialMedia::dashboard',[
				'chart' => $chart,
				'accounts' => Auth::user()->socialMediaAccounts
		]);
		} else {
			return view('SocialMedia::dashboard',['chart' => null]);
		}


	}
}