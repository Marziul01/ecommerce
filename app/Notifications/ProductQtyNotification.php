<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductQtyNotification extends Notification
{
    use Queueable;
    public $trackingProduct;
    /**
     * Create a new notification instance.
     */
    public function __construct($trackingProduct)
    {
        $this->trackingProduct = $trackingProduct;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'name' => $this->trackingProduct['name'],
            'qty' => $this->trackingProduct['qty'],
        ];
    }
}
