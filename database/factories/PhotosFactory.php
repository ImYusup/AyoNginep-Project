<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Photos::class, function (Faker $faker) {
    return [
        'room_id'=>$faker->numberBetween(1, 50),
        'image'=>$faker->imageUrl
    ];
});
