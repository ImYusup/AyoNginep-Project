<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Orders::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->randomDigitNotNull
    ];
});
