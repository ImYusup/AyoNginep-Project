<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => str_random(8), // secret
        'remember_token' => str_random(10)
    ];
});
