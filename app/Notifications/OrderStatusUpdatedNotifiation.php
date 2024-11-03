<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusUpdatedNotifiation extends Notification implements ShouldQueue
{
    use Queueable;
    protected $order;
    protected $status;

    public function __construct($order, $status)
    {
        $this->order = $order;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        $statusMessage = $this->status == 1
            ? 'Your order is on its way!'
            : 'Your order has been completed.';

        return (new MailMessage)
            ->subject('Order Status Updated')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line($statusMessage)
            ->line('Order ID: ' . $this->order->id)
            ->line('Total Amount: $' . $this->order->total)
            ->action('View Order', url('/orders/' . $this->order->id))
            ->line('Thank you for shopping with us!');
    }
}
