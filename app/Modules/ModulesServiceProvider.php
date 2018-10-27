<?php namespace App\Modules;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

/**
 * ServiceProvider
 *
 * The service provider for the modules. After being registered
 * it will make sure that each of the modules are properly loaded
 * i.e. with their routes, views etc.
 *
 * @author Kamran Ahmed <kamranahmed.se@gmail.com>
 * @package App\Modules
 */
class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider
{
	/**
	 * Will make sure that the required modules have been fully loaded
	 * @return void
	 */
	public function boot() {
		// For each of the registered modules, include their routes and Views
		$modules = config( "module.modules" );

		foreach ( $modules as $index => $module ) {

			// Load the routes for each of the modules
			if ( file_exists( __DIR__ . '/' . $module . '/routes.php' ) ) {
				include __DIR__ . '/' . $module . '/routes.php';
			}

			// Load the views
			if ( is_dir( __DIR__ . '/' . $module . '/Presentation/Views' ) ) {

				$this->loadViewsFrom( __DIR__ . '/' . $module . '/Presentation/Views', $module );
			}

			// Load the migrations
			if ( is_dir( __DIR__ . '/' . $module . '/Infrastructure/Migrations' ) ) {
				$this->loadMigrationsFrom( __DIR__ . '/' . $module . '/Infrastructure/Migrations');
			}
			// Load the seeder
			if ( is_dir( __DIR__ . '/' . $module . '/Infrastructure/Seeders' ) ) {
				$this->registerSeedsFrom( __DIR__ . '/' . $module . '/Infrastructure/Seeders');
			}
			if ( is_dir( __DIR__ . '/' . $module . '/Infrastructure/Factories' ) ) {
				$this->registerEloquentFactoriesFrom(__DIR__ . '/' . $module . '/Infrastructure/Factories');
			}

		}
	}

	/**
	 * Register factories.
	 *
	 * @param  string  $path
	 * @return void
	 */
	protected function registerEloquentFactoriesFrom($path)
	{
		$this->app->make(EloquentFactory::class)->load($path);
	}

	/**
	* Register seeds.
	*
	* @param  string  $path
	* @return void
	*/
	protected function registerSeedsFrom($path)
	{
		foreach (glob("$path/*.php") as $filename)
		{
			include $filename;
			$classes = get_declared_classes();
			$class = end($classes);

			$command = ( new \Illuminate\Http\Request )->server('argv', null);
			if (is_array($command)) {
				$command = implode(' ', $command);
				if ($command == "artisan db:seed") {
					Artisan::call('db:seed', ['--class' => $class]);
				}
			}

		}
	}

	public function register() {}

}