<?php

namespace App\Http\Controllers;

use App\Models\ProductInfo;
use App\Services\ProductInfoService;
use Illuminate\Http\Request;

class ProductInfoController extends Controller
{
    protected $productInfoService;

    public function __construct(ProductInfoService $productInfoService)
    {
        $this->productInfoService = $productInfoService;
    }

    public function index()
    {
        return response()->json($this->productInfoService->getAllProductInfos());
    }

    public function store(Request $request)
    {
        return response()->json($this->productInfoService->createProductInfo($request), 201);
    }

    public function show(ProductInfo $productInfo)
    {
        return response()->json($this->productInfoService->getProductInfo($productInfo));
    }

    public function update(Request $request, ProductInfo $productInfo)
    {
        return response()->json($this->productInfoService->updateProductInfo($request, $productInfo));
    }

    public function destroy(ProductInfo $productInfo)
    {
        $this->productInfoService->deleteProductInfo($productInfo);
        return response()->json(['message' => 'Product info deleted']);
    }
}
