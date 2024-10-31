<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IBlogService
{
    public function getAll(): ServiceResponse;

    public function create(string $name, string $description): ServiceResponse;

    public function delete(int $id): ServiceResponse;

    public function update(string $name, string $description, int $id): ServiceResponse;
}
