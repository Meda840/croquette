<?php

namespace App\Services;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PriceService
{
    public function getAllPrices()
    {
        return Price::all();
    }

    public function createPrice(Request $request)
    {
        try{
        // dd($request);
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);
        $validatedData['id']=Str::uuid()->toString();
        return Price::create($validatedData);
    }catch (\Exception $e) {
     
            return response()->json([
                'error' => 'An error occurred while creating the price of product.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getPrice(Price $price)
    {
        return $price;
    }

    public function updatePrice(Request $request, Price $price)
    {
        $validatedData = $request->validate([
            'product_id' => 'sometimes|required|exists:products,id',
            'quantity' => 'sometimes|required|integer',
            'price' => 'sometimes|required|numeric',
        ]);

        $price->update($validatedData);
        return $price;
    }

    public function deletePrice(Price $price)
    {
        $price->delete();
    }
}
