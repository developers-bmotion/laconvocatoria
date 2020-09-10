<?php

use Faker\Generator as Faker;

$factory->define(App\Artist::class, function (Faker $faker) {
    return [
        'user_id' => null,
        'nickname' => $faker->jobTitle,
        'biography' => $faker->text,
        'level_id' => \App\Level::all()->random()->id,
        'country_id' => \App\Country::all()->random()->id,
        'location_id' => \App\Location::all()->random()->id
    ];
});
