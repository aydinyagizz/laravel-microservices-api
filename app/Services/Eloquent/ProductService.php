<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Http\Requests\Api\Product\DeleteRequest;
use App\Interfaces\Eloquent\IProductService;
use App\Models\Product;

class ProductService implements IProductService
{

    public function getAll(): ServiceResponse
    {
        $product = Product::all();
        if (count($product) > 0) {
            return new ServiceResponse(true, "Product list!", $product, 200);
        }
        return new ServiceResponse(false, "Product not found!", $product, 401);
    }

    public function create(string $name, string $description, int $price): ServiceResponse
    {
        $product = Product::create([
            'name' => $name,
            'description' => $description,
            //'slug' => $slug,
            'price' => $price
        ]);
//        $product = new Product();
//        $product->name = $name;
//        $product->description = $description;
//        $product->slug = $slug;
//        $product->price = $price;
//        $product->save();

        if ($product) {
            return new ServiceResponse(true, "Product created!", $product, 200);

        }
        return new ServiceResponse(false, "Product creation failed!", null, 400 );
    }

    public function delete(int $id): ServiceResponse
    {
        $product = Product::find($id);
        if ($product) {
            $product->destroy($id);
            return new ServiceResponse(true, "Product Deleted!", null, 200);
        }
        return new ServiceResponse(false, "Product deleted fails!", null, 401);
    }

    public function update(string $name, string $description, int $price, int $id): ServiceResponse
    {
        $product = Product::find($id);

        if ($product) {
            $product->name = $name;
            $product->description = $description;
            $product->slug = null;
            $product->price = $price;
            $product->save();

            return new ServiceResponse(true, "Product updated!", $product, 200);
        }

        return new ServiceResponse(false, "Product update failed!", $product, 404);
    }
}
