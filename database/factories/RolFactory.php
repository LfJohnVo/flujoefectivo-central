<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rol;
use Faker\Generator as Faker;

$factory->define(Rol::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'id_users' => $faker->word
    ];
});
