<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'v1',
        'middleware' => ['api'],
    ],
    function () {
        Route::post('/auth/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    }
);

Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum', 'api'],], function () {

    Route::get('/me', function (Request $request) {
        return $request->user();
    })->middleware('checkRole:user,admin');

    Route::post('/auth/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('checkRole:user,admin');

    Route::get('/product', [\App\Http\Controllers\Api\ProductController::class, 'index']);
    Route::post('/product', [\App\Http\Controllers\Api\ProductController::class, 'store']);
    Route::delete('/product/{id}', [\App\Http\Controllers\Api\ProductController::class, 'destroy']);
    Route::put('/product/{id}', [\App\Http\Controllers\Api\ProductController::class, 'update']);

    Route::get('/blog', [\App\Http\Controllers\Api\BlogController::class, 'index']);
    Route::post('/blog', [\App\Http\Controllers\Api\BlogController::class, 'store']);
    Route::put('/blog/{id}', [\App\Http\Controllers\Api\BlogController::class, 'update']);

    Route::get('/user', [\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::post('/user', [\App\Http\Controllers\Api\UserController::class, 'create']);

}
);


