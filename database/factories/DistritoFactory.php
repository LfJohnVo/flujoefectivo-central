<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Distrito;
use Faker\Generator as Faker;

$factory->define(Distrito::class, function (Faker $faker) {

    return [
        'distrito' => $faker->word,
        'identificador' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
