<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;
use App\Models\Product;

interface IProductService
{
    public function getAll(): ServiceResponse;

    public function create(string $name, string $description, int $price): ServiceResponse;

    public function delete(int $id): ServiceResponse;

    public function update(string $name, string $description, int $price, int $id): ServiceResponse;
}
