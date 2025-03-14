<?php

use App\Http\Controllers\CommandController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInfoController;
use App\Http\Controllers\BrandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('products', [ProductController::class, 'index']);
Route::post('products', [ProductController::class, 'store']);
Route::delete('products/{idProduct}', [ProductController::class, 'destroy']);
Route::put('products', [ProductController::class, 'update']);
Route::apiResource('brands', BrandController::class);

Route::get('command', [CommandController::class, 'index']);
Route::post('command', [CommandController::class, 'store']);
Route::delete('command', [CommandController::class, 'destroy']);


Route::get('price', [PriceController::class, 'index']);
Route::post('price', [PriceController::class, 'store']);
Route::delete('price', [PriceController::class, 'destroy']);


Route::get('product-infos', [ProductInfoController::class, 'index']);
Route::post('product-infos', [ProductInfoController::class, 'store']);
Route::delete('product-infos', [ProductInfoController::class, 'destroy']);

Route::apiResource('product-infos', ProductInfoController::class);
Route::apiResource('prices', PriceController::class);