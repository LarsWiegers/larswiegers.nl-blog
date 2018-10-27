<?php


use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends DatabaseSeeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('categories')->insert([
			'title' => "Web",
			'description' => "All things web.",
			'public' => true,
			'slug' => str_slug('Web')
		]);
		DB::table('categories')->insert([
			'title' => "LifeStyle",
			'description' => "All things lifeStyle.",
			'public' => true,
			'slug' => str_slug('LifeStyle')
		]);
		DB::table('categories')->insert([
			'title' => "Programming",
			'description' => "All things programming.",
			'public' => true,
			'slug' => str_slug('Programming')
		]);
		DB::table('categories')->insert([
			'title' => "no Category",
			'description' => "All posts without a category.",
			'public' => true,
			'slug' => str_slug('no Category')
		]);
	}
}