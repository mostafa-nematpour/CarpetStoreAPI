<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::select('short_name', 'name', 'slug', 'price', 'description', 'discount')->get();

        // $products = Product::with('category', 'origin')->get();
        $products = Product::with([
            'category'=> function ($query) {
                $query->select('id', 'name', 'slug');
            },
            'origin'=> function ($query) {
                $query->select('id', 'name', 'slug');
            }])
            ->get([
                'id','short_name', 'name', 'slug', 'price', 'description', 'discount' ,'category_id', 'origin_id'
            ]);

        $products->makeHidden(['category_id', 'origin_id']);

        return response()->json($products);
    }

    public function show(Product $product)
    {
        return $product;
    }
}
