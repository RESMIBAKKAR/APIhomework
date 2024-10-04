<?php

namespace App\Http\Controllers\Api;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller;

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
        $product=Product::create($request->all());
        return response()->json( ['message'=>" ok createed "]);
    }

    public function show(string $id)
    {
        $product=Product::find($id);
        return $product;
    }
    
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json([
                "message" => "not found"
            ], 404);
        }
    
        $product->update($request->all());
    
        return response()->json([
            "message" => "updated"
        ], 200);
        
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            "message"=>"deleted",404]
        );
}}
