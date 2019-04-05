<?php

use Faker\Generator as Faker;

$factory->define(App\Passenger::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'flight_id' => function () {
            return factory(App\Flight::class)->create()->id;
        },
    ];
});
