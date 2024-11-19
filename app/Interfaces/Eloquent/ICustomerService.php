<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;
use App\DTOs\Customer\CustomerDTO;

interface ICustomerService
{
    public function getAll(): ServiceResponse;
    public function create(CustomerDTO $customerDTO): ServiceResponse;

    public function update(int $id, CustomerDTO $customerDTO): ServiceResponse;

    public function delete(int $id): ServiceResponse;

    public function findById(int $id): ServiceResponse;
}
