<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Rooms::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->firstNameFemale,
        'district'=>$faker->streetName,
        'coordinate'=>$faker->latitude($min = -90, $max = 90) . ',' . $faker->longitude($min = -180, $max = 180),
        'address_detail'=>$faker->address,
        'category_id'=>$faker->randomDigitNotNull,
        'rent'=>$faker->numberBetween($min = 1000000, $max = 9000000),
        'desc'=>$faker->paragraph($nb = 3, $asText = false),
        'user_id'=>$faker->randomDigitNotNull,
        'house_rules'=>$faker->paragraph($nb = 2, $asText = false),
    ];
});
