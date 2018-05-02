<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Order_details::class, function (Faker $faker) {
    return [
        'order_id'=>$faker->randomDigitNotNull,
        'room_id'=>$faker->randomDigitNotNull,
        'check_in_date'=>$faker->date($format = 'Y-m-d'),
        'check_out_date'=>$faker->date($format = 'Y-m-d'),
        'guest'=>$faker->randomDigitNotNull
    ];
});
