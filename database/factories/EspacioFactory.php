<?php

// use Faker\Generator as Faker;

$factory->define(App\Espacio::class, function (Faker\Generator $faker) {
  $faker->addProvider(new Faker\Provider\es_AR\Address($faker));
    return [
        'direccion' => $faker->streetName . $faker->buildingNumber,
        'dpto' => $faker->numberBetween(1,10) . $faker->randomLetter,
        'pais' => 'Argentina',
        'provincia' => $faker->randomElement(['Buenos Aires','CABA'])
    ];
});


// <?php
//
// use Faker\Generator as Faker;
//
// $factory->define(App\Pelicula::class, function (Faker $faker) {
//     return [
//         'title' => $faker->sentence,
//         'rating' => $faker->numberBetween(1,10),
//         'release_date' => $faker->date,
//         'genre_id' => App\Genero::inRandomOrder()->first()->id
//     ];
// });
