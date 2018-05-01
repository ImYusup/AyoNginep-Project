<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\TableData\User::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'password' => str_random(8), // secret
        'first_name'=> $faker->firstName,
        'last_name'=> $faker->lastName,
        'address'=> $faker->streetAddress,
        'phone'=> $faker->phoneNumber,
        'birthday'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender'=> $faker->randomElement(['L','P']),
        'photo'=> $faker->imageUrl,
        'about'=> $faker->paragraph($nb = 2, $asText = false),
        'remember_token' => str_random(10)
    ];
});
