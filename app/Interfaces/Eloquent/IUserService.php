<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IUserService
{
    public function getAll(): ServiceResponse;

    public function create(string $name, string $email, string $password): ServiceResponse;
}
