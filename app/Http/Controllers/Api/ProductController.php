<?php

namespace App\Http\Controllers\Api;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\CreateRequest;
use App\Http\Requests\Api\Product\DeleteRequest;
use App\Http\Requests\Api\Product\UpdateRequest;
use App\Interfaces\Eloquent\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use HttpResponse;

    private IProductService $productService;

    public function __construct(IProductService $productService){
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = $this->productService->getAll();
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
        $response = $this->productService->create(
            name: $request->name,
            description: $request->description,
            //slug: $request->slug,
            price: $request->price
        );

        return $this->httpResponse(
          isSuccess: $response->isSuccess(),
          message: $response->getMessage(),
          data: $response->getData(),
          statusCode: $response->getStatusCode()
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * UpdateRequest the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id)
    {
        $response = $this->productService->update(
            name: $request->name,
            description: $request->description,
            //slug: $request->slug,
            price: $request->price,
            id: $id
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
    public function destroy(DeleteRequest $request)
    {
        $response = $this->productService->delete($request->id);

        return $this->httpResponse(
            isSuccess: $response->isSuccess(),
            message: $response->getMessage(),
            data: $response->getData(),
            statusCode: $response->getStatusCode()
        );

    }
}
