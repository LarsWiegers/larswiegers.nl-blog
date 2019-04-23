<?php

use App\Modules\Visitors\Domain\IsHome;
use Faker\Generator as Faker;

$factory->define(IsHome::class, function (Faker $faker) {
    return [
        'created_at' => $faker->dateTimeBetween('-3month', '-2month'),
	    'ip' => $faker->firstName(),
	    'url' => $faker->firstName()
    ];
});
