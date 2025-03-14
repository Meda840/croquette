<?php

namespace App\Services;

use App\Models\ProductInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductInfoService
{
    public function getAllProductInfos()
    {
        return ProductInfo::all();
    }

    public function createProductInfo(Request $request)
    {
        try{
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|string',
            'value' => 'required|numeric',
        ]);      
         $validatedData['id'] = Str::uuid()->toString();


        return ProductInfo::create($validatedData);
    }
    catch(\Exception $e){
        return response()->json([
            'error' => 'An error occurred while creating the info of product.',
            'message' => $e->getMessage(),
        ], 500);
    }
    }

    public function getProductInfo(ProductInfo $productInfo)
    {
        return $productInfo;
    }

    public function updateProductInfo(Request $request, ProductInfo $productInfo)
    {
        $validatedData = $request->validate([
            'product_id' => 'sometimes|required|exists:products,id',
            'type' => 'sometimes|required|string',
            'value' => 'sometimes|required|numeric',
        ]);

        $productInfo->update($validatedData);
        return $productInfo;
    }

    public function deleteProductInfo(ProductInfo $productInfo)
    {
        $productInfo->delete();
    }
}
