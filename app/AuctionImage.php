<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionImage extends Model
{
    protected $guarded = [];

    public function auction()
    {
        return $this->belongsTo('App\Auction');
    }
}
