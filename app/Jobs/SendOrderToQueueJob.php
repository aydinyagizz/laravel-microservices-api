<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendOrderToQueueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $orderId;
    protected $productId;
    protected $quantity;
    protected $status;


    /**
     * Create a new job instance.
     */
    public function __construct($orderId, $productId, $quantity, $status)
    {
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->status = $status;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        echo "Order ID: " . $this->orderId . "\n";
        echo "Product ID: " . $this->productId . "\n";
        echo "Quantity: " . $this->quantity . "\n";
        echo "Status: " . $this->status . "\n";

    }
}
