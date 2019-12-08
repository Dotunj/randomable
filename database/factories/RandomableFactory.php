<?php

use Dotunj\Randomable\Models\Randomable;
use Faker\Generator as Faker;

$factory->define(Randomable::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->safeEmail,
    ];
});
