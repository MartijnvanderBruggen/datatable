<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Auction;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Auction::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'user_id' => $faker->randomDigitNotNull
    ];
});
