<?php

use Faker\Generator as Faker;

$factory->define(App\amenity_items::class, function (Faker $faker) {
    return [
        'item'=>$faker->firstNameMale
    ];
});
