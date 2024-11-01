<?php

namespace App\Http\Controllers\Api;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Blog\CreateRequest;
use App\Http\Requests\Api\Blog\UpdateRequest;
use App\Interfaces\Eloquent\IBlogService;
use App\Services\Eloquent\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */

    private IBlogService $blogService;

    public function __construct(IBlogService $blogService){
        $this->blogService = $blogService;
    }

//    private BlogService $blogService;
//
//    public function __construct(BlogService $blogService){
//        $this->blogService = $blogService;
//    }

    public function index()
    {
        $response = $this->blogService->getAll();
        return $this->httpResponse(
            isSuccess: $response->isSuccess(),
            message: $response->getMessage(),
            data: $response->getData(),
            statusCode: $response->getStatusCode()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $response = $this->blogService->create(
            name: $request->name,
            description: $request->description,
        );
        return $this->httpResponse(
            isSuccess: $response->isSuccess(),
            message: $response->getMessage(),
            data: $response->getData(),
            statusCode: $response->getStatusCode()
        );
    }


    /**
     * UpdateRequest the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $response = $this->blogService->update(
            name: $request->name,
            description: $request->description,
            id: $id,
        );
        return $this->httpResponse(
            isSuccess: $response->isSuccess(),
            message: $response->getMessage(),
            data: $response->getData(),
            statusCode: $response->getStatusCode()
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
