<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Amenity_items::class, function (Faker $faker) {
    return [
        'item'=>$faker->firstNameMale
    ];
});
