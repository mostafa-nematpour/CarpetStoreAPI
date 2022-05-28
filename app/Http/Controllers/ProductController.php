<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {


        $products = Product::with([
            'category' => function ($query) {
                $query->select('id', 'name', 'slug');
            },
            'origin' => function ($query) {
                $query->select('id', 'name', 'slug');
            }
        ])->when($request->has('available') && $request->available == 'true', function ($query) {
            $query->where('number', '>', 0);
        })
            ->get([
                'id', 'short_name', 'name', 'slug', 'price', 'description', 'discount', 'category_id', 'origin_id'
            ]);

        $products->makeHidden(['category_id', 'origin_id']);



        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price':
                    $products = $products->sortBy('price');
                    break;
                case 'price-desc':
                    $products = $products->sortByDesc('price');
                    break;
                case 'newest':
                    $products = $products->sortByDesc('created_at');
                    break;
                case 'older':
                    $products = $products->sortBy('created_at');
                    break;
                default:
                    break;
            }
        }

        // if ($request->has('available') && $request->available == 'true') {
        //     // dd($products);
        //     // $products = $products->where('number', '!=', 0);
        // }


        // $products = Product::select('short_name', 'name', 'slug', 'price', 'description', 'discount')->get();

        // $products = Product::with('category', 'origin')->get();

        return response()->json($products);
    }



    public function show(Product $product)
    {
        $product = $product->load([
            'category' => function ($query) {
                $query->select('id', 'name', 'slug');
            },
            'origin' => function ($query) {
                $query->select('id', 'name', 'slug');
            }
        ]);

        return $product;
    }


    public function insert(Request $request)
    {

        if (auth()->user() && auth()->user()->role_id == 1) {
            // dd("");
        }
        return response()->json(['message' => 'Unauthorized'], 401);



        // $validator = Validator::make($request->all(), [

        // ]);

        // $product = Product::create($request->all());

        // return response()->json($product);
    }
}
