<?php

namespace App\Modules\SocialMedia\Application\Controllers;

use App\Charts\DefaultChart;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {
	public function index () {
		$colors = ['#00ffaa', '#aaff00'];

		$chart = new DefaultChart();
		$chart
			->width(400)
			->height(400);
		$arraySet = new Collection();
		$labels = [];
		$xLabels = [];
		forEach(Auth::user()->socialMediaAccounts as $mediaAccount) {
			$collection = new Collection();
			forEach($mediaAccount->UserCount as $socialMediaUserCount) {
				$collection->push($socialMediaUserCount->count);
				$xLabels[] = $socialMediaUserCount->created_at->format('m/d/Y');
			}
			$labels[] = $mediaAccount->name;
			$arraySet->push($collection);
		}
		foreach($arraySet as $index => $data) {
			$chart->dataset($labels[$index], 'line', $data)
			      ->color($colors[$index])
				->backgroundColor($colors[$index])
				->fill(false);
		}
		$chart->labels($xLabels);

		return view('SocialMedia::dashboard',['charts' => [$chart]]);
	}
}