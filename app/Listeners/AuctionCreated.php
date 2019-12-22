<?php

namespace App\Listeners;

use App\Auction;
use App\Events\AuctionCreated;
use App\Notifications\AuctionUpdatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class AuctionCreated
{
    public $auction;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Auction $auction)
    {
        $this->auction = $auction;
    }

    /**
     * Handle the event.
     *
     * @param  AuctionCreated  $event
     * @return void
     */
    public function handle(AuctionCreated $event)
    {
        $user = Auth::user();
        $user->notify(new AuctionCreated($event->auction));
    }
}
