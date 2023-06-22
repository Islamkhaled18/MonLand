<?php

namespace App\Listeners;

use App\Events\OrderStatusUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class UpdateProductQuantity
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
    public function handle(OrderStatusUpdated $event)
    {
        if ($event->newStatus === 'تم تسليمها للعميل') {
            $order = $event->order;
            $orderProducts = $order->items;

            foreach ($orderProducts as $orderProduct) {
                $productId = $orderProduct->product_id;
                $quantity = $orderProduct->quantity;

                DB::table('products')
                    ->where('id', $productId)
                    ->decrement('qty', $quantity);
            }
        }
    }
}
