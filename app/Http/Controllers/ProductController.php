<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $products = Product::select('short_name','name','slug','price','description','discount')->get();
        
        return response()->json($products);
    }

    public function show(Product $product)
    {
        return $product;
    }

}
