<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Room_capacities::class, function (Faker $faker) {
    return [
        'room_id'=>$faker->randomDigitNotNull,
        'bed'=>$faker->randomDigitNotNull,
        'bathroom'=>$faker->randomDigitNotNull,
        'person'=>$faker->randomDigitNotNull,
    ];
});
