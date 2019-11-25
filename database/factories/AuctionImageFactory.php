<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;


$factory->define(App\AuctionImage::class, function (Faker $faker) {
    return [
        'auction_id' => $faker->randomDigitNotNull,
        'image_path' => $faker->imageUrl('public/storage/images',400,null, null, false),
    ];
});
