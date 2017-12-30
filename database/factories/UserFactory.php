<?php

// use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\es_AR\Person($faker));
    static $password;

    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'birthdate' => $faker->dayOfMonth . '-' . $faker->Month . '-' . $faker->year,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
