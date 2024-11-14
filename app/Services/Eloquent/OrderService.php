<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IOrderService;
use App\Jobs\SendOrderToQueueJob;
use App\Models\Order;


class OrderService implements IOrderService
{
    public function createOrder(array $data): ServiceResponse
    {
        // Veritabanında sipariş oluşturma
        $order = Order::create([
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
            'status' => 'created',
        ]);

        SendOrderToQueueJob::dispatch($order->id, $order->product_id, $order->quantity, $order->status);

        return new ServiceResponse(true, 'Order created and message sent to queue.', $order, 200);
    }
}
