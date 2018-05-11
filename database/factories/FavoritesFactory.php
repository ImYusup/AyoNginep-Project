<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Favorites::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween(1, 10),
        'room_id'=>$faker->numberBetween(1, 50),
    ];
});
