<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Services\PriceService;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    protected $priceService;

    public function __construct(PriceService $priceService)
    {
        $this->priceService = $priceService;
    }

    public function index()
    {
        return response()->json($this->priceService->getAllPrices());
    }

    public function store(Request $request)
    {
        return response()->json($this->priceService->createPrice($request), 201);
    }

    public function show(Price $price)
    {
        return response()->json($this->priceService->getPrice($price));
    }

    public function update(Request $request, Price $price)
    {
        return response()->json($this->priceService->updatePrice($request, $price));
    }

    public function destroy(Price $price)
    {
        $this->priceService->deletePrice($price);
        return response()->json(['message' => 'Price deleted']);
    }
}
