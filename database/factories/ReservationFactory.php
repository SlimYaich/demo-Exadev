<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        //
        'user_id' => App\User::pluck('id')->random(),
        'voiture_id' => App\Voiture::pluck('id')->random(),
        'date_debut_location' => $faker->dateTime(),
        'date_fin_location' => $faker->dateTime(),
        'nb_jours' => $faker->numberBetween(0, 100),
        'PrixTTC' => $faker->randomDigit(100, 200),
        'notes' => $faker->text(300),
    ];
});
