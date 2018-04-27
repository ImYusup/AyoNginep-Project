<?php

use Faker\Generator as Faker;

$factory->define(App\photos::class, function (Faker $faker) {
    return [
        'room_id'=>$faker->randomDigitNotNull,
        'image'=>$faker->imageUrl
    ];
});
