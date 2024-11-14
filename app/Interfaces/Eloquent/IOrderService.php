<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IOrderService
{
    public function createOrder(array $data): ServiceResponse;
}
