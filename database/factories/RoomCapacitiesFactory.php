<?php

use Faker\Generator as Faker;

$array = [];

for ($i=1; $i <= 50 ; $i++) { 
    array_push($array, $i);
}

$factory->define(App\TableData\Room_capacities::class, function (Faker $faker) {
    return [
        'room_id'=>$faker->randomDigitNotNull,
        'bed'=>$faker->randomDigitNotNull,
        'bathroom'=>$faker->randomDigitNotNull,
        'person'=>$faker->randomDigitNotNull,
    ];
});
