<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Auction;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Auction::class, function (Faker $faker) {
    return [

        'description' => $faker->paragraph,
        'user_id' => $faker->randomDigitNotNull,
        'category_id' => $faker->randomDigitNotNull
    ];
});
