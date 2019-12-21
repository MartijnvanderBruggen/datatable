<?php

namespace App\Listeners;

use App\Auction;
use App\Events\AuctionUpdatedEvent;
use App\Notifications\AuctionUpdatedNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AuctionUpdatedListener
{
    /**
     * @var Auction
     */
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
     * @param  AuctionUpdatedEvent  $event
     * @return void
     */
    public function handle(AuctionUpdatedEvent $event)
    {
        $user = Auth::user();
        $user->notify(new AuctionUpdatedNotification($event->auction));
    }
}
