<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $order;
    protected $buyer;

    public function __construct($order, $buyer)
    {
        $this->order = $order;
        $this->buyer = $buyer;
    }

    public function via($notifiable)
    {
        // You can specify the delivery channels here (e.g., 'mail', 'database')
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Order Placed')
            ->greeting('Hello Admin,')
            ->line('A new order has been placed by ' . $this->buyer->name . '.')
            ->line('Order ID: ' . $this->order->id)
            ->line('Total Amount: $' . $this->order->total)
            ->action('View Order', url('/admin/orders/' . $this->order->id))
            ->line('Thank you for your attention.');
    }
}
