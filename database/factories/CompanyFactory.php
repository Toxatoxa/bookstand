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

$factory->define(\App\Company::class, function (Faker\Generator $faker) {
    $values = [];
    for ($i = 0; $i < rand(1, 3); $i++)
        $values [] = $faker->e164PhoneNumber;

    return [
        'name'     => $faker->company,
        'email'    => $faker->safeEmail,
        'contact_name' => $faker->name,
        'contacts' => implode(', ', $values),
    ];
});
