<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IBlogService;
use App\Models\Blog;
use App\Services\Repository\Api\Blog\BlogRepository;

class BlogService implements IBlogService
{

    public function getAll(): ServiceResponse
    {
        $blog = Blog::all();
        if (count($blog) > 0) {
            return new ServiceResponse(true, "Blog list!", $blog, 200);
        }
        return new ServiceResponse(false, "Blog not found!", $blog, 401);
    }

    public function create(string $name, string $description): ServiceResponse
    {
        $blog = Blog::create([
            'name' => $name,
            'description' => $description
        ]);
        if ($blog) {
            return new ServiceResponse(true, "Blog created!", $blog, 200);
        }
        return new ServiceResponse(false, "Blog creation failed!", $blog, 401);
    }

    public function delete(int $id): ServiceResponse
    {
        // TODO: Implement delete() method.
    }

    public function update(string $name, string $description, int $id): ServiceResponse
    {
        $blog = Blog::find($id);
        if ($blog) {
            $blog->name = $name;
            $blog->description = $description;
            $blog->slug = null;
            $blog->save();
            return new ServiceResponse(true, "Blog updated!", $blog, 200);
        }
        return new ServiceResponse(false, "Blog not found!", $blog, 401);
    }
}
