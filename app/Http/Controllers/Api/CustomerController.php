<?php

namespace App\Http\Controllers\Api;

use App\Core\HttpResponse;
use App\DTOs\Customer\CustomerDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Customer\CreateRequest;
use App\Http\Requests\Api\Customer\DeleteRequest;
use App\Http\Requests\Api\Customer\UpdateRequest;
use App\Interfaces\Eloquent\ICustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use HttpResponse;
    private ICustomerService $customerService;

    public function __construct(ICustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $response = $this->customerService->getAll();
        return $this->httpResponse(
            isSuccess: $response->isSuccess(),
            message: $response->getMessage(),
            data: $response->getData(),
            statusCode: $response->getStatusCode()
        );
    }

    // Store customer
    public function store(CreateRequest $request)
    {
//        $validated = $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|unique:customers,email',
//            'password' => 'required|string|min:6',
//        ]);

        $customerDTO = CustomerDTO::fromArray($request->toArray());
        $response = $this->customerService->create($customerDTO);

        return response()->json([
            'success' => $response->isSuccess(),
            'message' => $response->getMessage(),
            'data' => $response->getData(),
        ], $response->getStatusCode());
    }

    // Update customer
    public function update(int $id, UpdateRequest $request)
    {
//        $validated = $request->validate([
//            'name' => 'nullable|string|max:255',
//            'email' => 'nullable|email|unique:customers,email,' . $id,
//            'password' => 'nullable|string|min:6',
//        ]);


        $customerDTO = CustomerDTO::fromArray($request->toArray());
        $response = $this->customerService->update($id, $customerDTO);

        return response()->json([
            'success' => $response->isSuccess(),
            'message' => $response->getMessage(),
            'data' => $response->getData(),
        ], $response->getStatusCode());
    }

    // Delete customer
    public function destroy(DeleteRequest $request)
    {
        $response = $this->customerService->delete($request->id);

        return response()->json([
            'success' => $response->isSuccess(),
            'message' => $response->getMessage(),
            'data' => $response->getData(),
        ], $response->getStatusCode());
    }

}
