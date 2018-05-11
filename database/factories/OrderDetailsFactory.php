<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Order_details::class, function (Faker $faker) {
    return [
        'order_id'=>$faker->numberBetween(1, 10),
        'room_id'=>$faker->numberBetween(1, 50),
        'check_in_date'=>$faker->date($format = 'Y-m-d'),
        'check_out_date'=>$faker->date($format = 'Y-m-d'),
        'guest'=>$faker->randomDigitNotNull
    ];
});
