<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\DTOs\Customer\CustomerDTO;
use App\Interfaces\Eloquent\ICustomerService;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerService implements ICustomerService
{

    public function getAll(): ServiceResponse
    {
        $customer = Customer::all();
        if (count($customer) > 0) {
            return new ServiceResponse(true, "Customer list!", $customer, 200);
        }
        return new ServiceResponse(false, "Customer not found!", $customer, 401);
    }

    public function create(CustomerDTO $customerDTO): ServiceResponse
    {
        // Hash password before saving
        $data = $customerDTO->toArray();
        $data['password'] = Hash::make($data['password']); // Hash the password

        $customer = Customer::create($data);

        if ($customer) {
            return new ServiceResponse(true, "Customer created successfully.", $customer, 201);
        }

        return new ServiceResponse(false, "Customer creation failed.", null, 400);
    }

    public function update(int $id, CustomerDTO $customerDTO): ServiceResponse
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return new ServiceResponse(false, "Customer not found.", null, 404);
        }

        $data = $customerDTO->toArray();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $customer->update($data);

        return new ServiceResponse(true, "Customer updated successfully.", $customer, 200);
    }

    public function delete(int $id): ServiceResponse
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return new ServiceResponse(false, "Customer not found.", null, 404);
        }

        $customer->delete();

        return new ServiceResponse(true, "Customer deleted successfully.", null, 200);
    }

    // findById
    public function findById(int $id): ServiceResponse
    {
        $customer = Customer::find($id);
        if ($customer) {
            return new ServiceResponse(true, "Customer found!", $customer, 200);
        }
        return new ServiceResponse(false, "Customer not found!", $customer, 401);
    }
}
