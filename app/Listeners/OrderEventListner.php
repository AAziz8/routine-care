<?php

namespace App\Listeners;

use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class OrderEventListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $order = $event->order;
        $type = $event->type;
        $buyer = Auth::user();

        if ($type == "created") {
            $admin = User::where('role_id', 0)->first();
            if ($admin) {
                $admin->notify(new OrderNotification($order, $buyer));
            }
        }
    }
}
