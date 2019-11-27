<?php

namespace App\Modules\Visitors\Application\Controllers;

use App\Charts\DefaultChart;
use App\Http\Controllers\Controller;
use App\Modules\Visitors\Domain\Visitor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

	public function index() {
		$allToday = Visitor::allToday();
		$allMonth = Visitor::allMonth();
		$allYear  = Visitor::allYear();

		$previousToday = Visitor::allYesterday();
		$previousMonth = Visitor::allPreviousMonth();
		$previousYear = Visitor::allPreviousYear();

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
		$labels = new Collection(Visitor::perMonthOfTheLast12Months()->keys());
		$chart->labels($labels->toArray());

		$collection = new Collection();

		forEach(Visitor::perMonthOfTheLast12Months() as $monthNumberOfVisitors) {
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

		forEach(Visitor::perMonthOfLastYear() as $monthNumberOfVisitors) {
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

		$urls = DB::table('visitors')
            ->select(DB::raw('count(*) as value, url'))
            ->groupBy('url')
            ->orderBy('value', 'desc')
            ->get();

		return view('Visitors::home', [
				'allToday' => count($allToday),
				'allMonth' => count($allMonth),
				'allYear' => count($allYear),
				'previousToday' => count($previousToday),
				'previousMonth' => count($previousMonth),
				'previousYear' => count($previousYear),
				'chart' => $chart,
                'urls' => $urls
			]);
	}
}
