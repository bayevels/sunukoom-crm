<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'job' => $faker->jobTitle,
        'point_id' => function () {
            return factory(App\Point::class)->create()->id;
        },
    ];
});
