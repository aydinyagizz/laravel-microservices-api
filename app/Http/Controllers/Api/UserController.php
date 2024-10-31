<?php

namespace App\Http\Controllers\Api;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\CreateRequest;
use App\Interfaces\Eloquent\IUserService;

class UserController extends Controller
{
    use HttpResponse;

    private IUserService $userService;

    public function __construct(IUserService $userService){
        $this->userService = $userService;
    }

    public function index(){
        $response = $this->userService->getAll();
        return $this->httpResponse(
            isSuccess: $response->isSuccess(),
            message: $response->getMessage(),
            data: $response->getData(),
            statusCode: $response->getStatusCode()
        );
    }

    public function create(CreateRequest $request){

        // İstekten gelen verileri al
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        // UserService'e gönder
        $response = $this->userService->create($name, $email, $password);

        return $this->httpResponse(
            isSuccess: $response->isSuccess(),
            message: $response->getMessage(),
            data: $response->getData(),
            statusCode: $response->getStatusCode()
        );
    }

}
