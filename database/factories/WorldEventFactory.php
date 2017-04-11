<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(\App\WorldEvent::class, function (Faker\Generator $faker) {
    return [
        'title'       => 'Event: '.$faker->sentence,
        'description' => $faker->text(500),
        'lat' => $faker->randomFloat(5, -90, 90),
        'lng' => $faker->randomFloat(5, -180, 180),
        'start_at' => $startAt = $faker->dateTimeBetween('-30 days', '30 days'),
        'finish_at' => $faker->dateTimeInInterval($startAt, '+20 days'),
    ];
});
