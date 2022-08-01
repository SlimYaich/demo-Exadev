<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contrat;
use Faker\Generator as Faker;

$factory->define(Contrat::class, function (Faker $faker) {
    return [
        //

        'prixVente' => $faker->randomDigit(100, 200),
        'code' => $faker->numberBetween(),
        'notes' => $faker->text(300),
    ];
});
