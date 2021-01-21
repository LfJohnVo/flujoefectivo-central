<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\distrital;
use Faker\Generator as Faker;

$factory->define(distrital::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'clave_distrito' => $faker->word,
        'id_regional' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'estatus' => $faker->word
    ];
});
