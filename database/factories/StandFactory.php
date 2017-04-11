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

$factory->define(\App\Stand::class, function (Faker\Generator $faker) {

    $company = null;

    if (rand(0, 1))
        $company = factory(App\Company::class)->create();

    return [
        'rent_price' => $faker->randomFloat(2, 10, 100),
        'company_id' => ($company) ? $company->id : null,
    ];
});
