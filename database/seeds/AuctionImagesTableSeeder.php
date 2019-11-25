<?php

use Illuminate\Database\Seeder;

class AuctionImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AuctionImage::class,50)->create();
    }
}
