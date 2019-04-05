<?php

use Faker\Generator as Faker;

$factory->define(App\Flight::class, function (Faker $faker) {
    return [
        'code' => strtoupper($faker->bothify('??####')),
        'total_seats' => $faker->numberBetween(100, 300),
    ];
});
