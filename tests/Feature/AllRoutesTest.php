<?php
namespace Tests\Feature;

use Illuminate\Routing\RouteCollection;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class AllRoutesTest extends TestCase
{
	public function testAllRoute()
	{
		/** @var RouteCollection $routeCollection */
		$routeCollection = Route::getRoutes();
		$this->withoutEvents();
		$blacklist = [
			'url/that/not/tested',
		];
		$dynamicReg = "/{\\S*}/";
		foreach ($routeCollection as $route) {
			if (!preg_match($dynamicReg, $route->uri) &&
			    in_array('GET', $route->methods) &&
			    !in_array($route->uri, $blacklist)
			) {
				$start = $this->microtimeFloat();
				$response = $this->call('GET', $route->uri);
				$end = $this->microtimeFloat();
				$temps = round($end - $start, 3);

				$this->assertLessThan(30, $temps, "too long time for " . $route->uri);

				$this->assertContains($response->getStatusCode(), [200,302], "/" . $route->uri . " failed to load");
			}

		}
	}

	public function microtimeFloat()
	{
		list($usec, $asec) = explode(" ", microtime());

		return ((float)$usec + (float)$asec);

	}
}