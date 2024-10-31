<?php

namespace App\Repositories\Interfaces;

interface IUserRepository
{
    public function getAll();

    public function create(string $name, string $email, string $password);
}
