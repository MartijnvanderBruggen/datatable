<?php

namespace App\Notifications;

use App\Auction;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class AuctionUpdatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $auction;
    /**
     * Create a new notification instance.
     *
     * @param $auction
     */
    public function __construct(Auction $auction)
    {

        $this->auction = $auction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast'];
    }


    public function toBroadcast($notifiable)
    {
        return [
            'auction' => $this->auction,
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
