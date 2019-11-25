<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionImage extends Model
{
    protected $fillable = ['auction_id', 'image_path'];

    public function auction()
    {
        return $this->belongsTo('App\Auction');
    }
}
