<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IUserService;
use App\Repositories\Classes\UserRepository;
use App\Jobs\SendWelcomeEmailJob;

class UserService implements IUserService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll(): ServiceResponse
    {
        $user = $this->userRepository->getAll();
        if ($user) {
            return new ServiceResponse(true, "Get all users", $user, 200);
        }
        return new ServiceResponse(false, "Get users failed", null, 404);
    }

    public function create(string $name, string $email, string $password): ServiceResponse
    {
        $user = $this->userRepository->create($name, $email, $password);
        if ($user) {
            // Kullanıcıya hoş geldin e-postası göndermek için job’a ekleme
            SendWelcomeEmailJob::dispatch($user);
            return new ServiceResponse(true, "Created user", $user, 200);
        }
        return new ServiceResponse(false, "Created user failed", null, 400);
    }
}
