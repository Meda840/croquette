<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductService
{
    public function getAllProducts()
    {
        return Product::with(['prices', 'productInfos'])->get();
    }

    public function createProduct(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'description' => 'nullable|string',
                'weight' => 'required|numeric',
                'pallet_quantity' => 'required|integer',
            ]);
            
            // Add unique ID to the validated data
            $validatedData['id'] = Str::uuid()->toString();
            
            // Attempt to create the product
            $product=Product::create($validatedData);
            $product=$product->fresh();
            return $product;
           
        } catch (\Exception $e) {
            // Return the error message in case of failure
            return response()->json([
                'error' => 'An error occurred while creating the product.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    

    public function getProduct(Product $product)
    {
        return $product->load(['prices', 'productInfos']);
    }

    public function updateProduct(Request $request)
    {
        try {
            $product = Product::findOrFail($request['id']); 
    
            $validatedData = $request->validate([
                'name' => 'sometimes|required|string',
                'description' => 'nullable|string',
                'weight' => 'sometimes|required|numeric',
                'pallet_quantity' => 'sometimes|required|integer',
            ]);
    
            $product->update($validatedData);    
            return response()->json($product, 200); // Return with status code 200
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while updating the product.',
                'message' => $e->getMessage(),
            ], $e instanceof ModelNotFoundException ? 404 : 500);
        }
    }
    

    public function deleteProduct($idProduct)
    {
        try{
            $product = Product::findOrFail($idProduct); 
            $product->delete();
        }catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while delete the product.',
                'message' => $e->getMessage(),
            ], $e instanceof ModelNotFoundException ? 404 : 500);
        }
    }
}
