<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Favorites::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->randomDigitNotNull,
        'room_id'=>$faker->randomDigitNotNull,
    ];
});
