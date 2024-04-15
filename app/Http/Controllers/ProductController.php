<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['nullable'],
            'description' => ['nullable'],
            'category' => ['nullable'],
            'quantity' => ['nullable', 'integer'],
            'price' => ['nullable', 'integer'],
            'image' => ['nullable'],
        ]);

        return Product::create($data);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['nullable'],
            'description' => ['nullable'],
            'category' => ['nullable'],
            'quantity' => ['nullable', 'integer'],
            'price' => ['nullable', 'integer'],
            'image' => ['nullable'],
        ]);

        $product->update($data);

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}
