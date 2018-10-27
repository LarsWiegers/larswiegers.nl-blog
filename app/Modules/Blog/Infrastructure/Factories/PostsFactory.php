<?php

use App\Modules\Blog\Domain\Category;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(\App\Modules\Blog\Domain\Post::class, function (Faker $faker) {
    return [
    	'created_at' => Carbon::now(),
    	'updated_at' => Carbon::now(),
    	'public' => rand(0,10) > 5 ? 1 : 0,
	    'title' => $faker->title(),
	    'content' => $faker->text(500),
	    'author_id' => rand(1, User::all()->count()),
	    'category_id' => rand(1, Category::all()->count()),
    ];
});
