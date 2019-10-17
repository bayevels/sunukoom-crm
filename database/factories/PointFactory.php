<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Point;
use Faker\Generator as Faker;

$factory->define(Point::class, function (Faker $faker) {
    return [
        'type' => $faker->jobTitle,
        'address' => $faker->address,
        // 'department' => $faker->city,
        'region' => $faker->country,
    ];
});
