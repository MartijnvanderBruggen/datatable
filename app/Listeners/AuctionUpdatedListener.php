<?php

namespace App\Listeners;

use App\Auction;
use App\Events\AuctionUpdatedEvent;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
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
        $users = User::all();
        Notification::send($users, new \App\Notifications\AuctionUpdatedNotification($event->auction));
    }
}
