<?php

use Faker\Generator as Faker;

$factory->define(App\TableData\Categories::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstNameFemale
    ];
});
