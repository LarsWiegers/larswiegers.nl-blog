<?php

use App\Modules\Visitors\Domain\Visitor;
use Faker\Generator as Faker;

$factory->define(Visitor::class, function (Faker $faker) {
    return [
        'created_at' => $faker->dateTimeBetween('-3month', '-2month'),
	    'ip' => $faker->firstName(),
	    'url' => $faker->firstName()
    ];
});
