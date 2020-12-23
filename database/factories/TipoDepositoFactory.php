<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TipoDeposito;
use Faker\Generator as Faker;

$factory->define(TipoDeposito::class, function (Faker $faker) {

    return [
        'tipo' => $faker->word,
        'estatus' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'update_at' => $faker->date('Y-m-d H:i:s')
    ];
});
