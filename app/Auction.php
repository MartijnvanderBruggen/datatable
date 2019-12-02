<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $fillable = ['user_id','category_id','description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\AuctionImage');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
