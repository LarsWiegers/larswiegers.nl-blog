<?php


use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends DatabaseSeeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory( \App\Modules\Blog\Domain\Post::class, 50 )->create();
	}
}