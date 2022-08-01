<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Voiture;
use Faker\Generator as Faker;

$factory->define(Voiture::class, function (Faker $faker) {
    return [
        //

        'marque' => $faker->company,
        'couleur' => $faker->colorName(),
        'catégorie' => $faker->year,
        'nbPlace' => $faker->numberBetween(3, 4),
        'vitesse' => $faker->numberBetween(200, 210),
        'kilometrage' => $faker->randomFloat(),
        'dispo' => $faker->randomDigit(0, 1),
        'prixJ' => $faker->randomDigit(100, 200),

    ];
});
