<?php

namespace App\Modules\Visitors\Application\Controllers;

use App\Charts\DefaultChart;
use App\Http\Controllers\Controller;
use App\Modules\Visitors\Domain\IsHome;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller {

	public function index() {
		$allToday = IsHome::allToday();
		$allMonth = IsHome::allMonth();
		$allYear  = IsHome::allYear();

		$previousToday = IsHome::allYesterday();
		$previousMonth = IsHome::allPreviousMonth();
		$previousYear = IsHome::allPreviousYear();

		$chart = new DefaultChart();
		$colors = [
			'Dec' => '#7bc043',
			'Nov' => '#fed766',
			'Sep' => '#2ab7ca',
			'Oct' => '#fe4a49',
			'Aug' => '#f6abb6',
			'Jul' => '#03396c',
			'Jun' => '#b3cde0',
			'May' => '#651e3e',
			'Apr' => '#851e3e',
			'Mar' => '#0e9aa7',
			'Feb' => '#fe8a71',
			'Jan' => '#4b86b4',
		];
		$labels = new Collection(IsHome::perMonthOfTheLast12Months()->keys());
		$chart->labels($labels->toArray());

		$collection = new Collection();

		forEach(IsHome::perMonthOfTheLast12Months() as $monthNumberOfVisitors) {
			$collection->add(count($monthNumberOfVisitors));

		}

		$chart->dataset(' # of visitors this year', 'line', $collection)
		        ->color($colors['Dec'])
		        ->backgroundColor($colors['Dec'])
				->options([
					'scales' => [
						'yAxes' => 'stacked'
					]
				])
		      ->fill(false);


		$collection = new Collection();

		forEach(IsHome::perMonthOfLastYear() as $monthNumberOfVisitors) {
			$collection->add(count($monthNumberOfVisitors));

		}

		$chart->dataset(' # of visitors last year', 'line', $collection)
		      ->color($colors['Jan'])
		      ->backgroundColor($colors['Jan'])
				->options([
					'scales' => [
						'yAxes' => 'stacked'
					]
				])
		      ->fill(false);

		return view('Visitors::home', [
				'allToday' => count($allToday),
				'allMonth' => count($allMonth),
				'allYear' => count($allYear),
				'previousToday' => count($previousToday),
				'previousMonth' => count($previousMonth),
				'previousYear' => count($previousYear),
				'chart' => $chart
			]);
	}
}
