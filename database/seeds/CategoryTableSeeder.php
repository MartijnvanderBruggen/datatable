<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class,20)->create()->each(function($category){
           $category->auctions()->saveMany(factory(App\Auction::class,10))->make();
        });
    }
}
