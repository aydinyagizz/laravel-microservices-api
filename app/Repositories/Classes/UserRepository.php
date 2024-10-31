<?php

namespace App\Repositories\Classes;

use App\Models\User;
use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Support\Facades\Hash;

class UserRepository implements IUserRepository
{
    protected $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function create(string $name, string $email, string $password)
    {
        return $this->model->create([
            'name'=> $name,
            'email'=> $email,
            'password' => Hash::make($password)
        ]);
    }
}
