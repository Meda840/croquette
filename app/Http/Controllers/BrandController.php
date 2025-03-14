<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    // Get all brands
    public function index()
    {
        return response()->json(Brand::all());
    }

    // Get a single brand by ID
    public function show($id)
    {
        $brand = Brand::find($id);
        return $brand ? response()->json($brand) : response()->json(['message' => 'Brand not found'], 404);
    }

    // Store a new brand
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|unique:brands']);

        $brand = Brand::create($request->all());

        return response()->json($brand, 201);
    }

    // Update a brand
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        $request->validate(['name' => 'required|string|unique:brands,name,' . $id]);

        $brand->update($request->all());

        return response()->json($brand);
    }

    // Delete a brand
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return response()->json(['message' => 'Brand not found'], 404);
        }

        $brand->delete();

        return response()->json(['message' => 'Brand deleted successfully']);
    }
}