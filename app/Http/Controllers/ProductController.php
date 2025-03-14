<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return response()->json($this->productService->getAllProducts());
    }

    public function store(Request $request)
    {
       
        return response()->json($this->productService->createProduct($request), 201);
    }

    public function show(Product $product)
    {
        return response()->json($this->productService->getProduct($product));
    }

    public function update(Request $request, Product $product)
    {
        return response()->json($this->productService->updateProduct($request, $product));
    }

    public function destroy($idProduct)
    {
        $this->productService->deleteProduct($idProduct);
        return response()->json(['message' => 'Product deleted']);
    }
}
