<?php

namespace App\Http\Controllers\Api;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Order\CreateRequest;
use App\Interfaces\Eloquent\IOrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use HttpResponse;
    private IOrderService $orderService;

    public function __construct(IOrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function create(CreateRequest $request)
    {
        $response = $this->orderService->createOrder($request->all());

        return $this->httpResponse(
            isSuccess: $response->isSuccess(),
            message: $response->getMessage(),
            data: $response->getData(),
            statusCode: $response->getStatusCode()
        );
    }
}
