<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
// use Validator;

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
            },

        ])->when($request->has('available') && $request->available == 'true', function ($query) {
            $query->where('number', '>', 0);
        })
            ->get([
                'id', 'short_name', 'name', 'slug', 'price', 'thumbnail',
                'description', 'discount', 'category_id', 'origin_id'
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

    public function destroy(Request $request)
    {
        if (auth()->user() && auth()->user()->role_id == 1) {

            $validator = Validator::make($request->all(), [
                'product_id' => 'required|numeric|exists:products,id',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            if (Product::destroy($request->product_id)) {
                return response()->json([
                    'message' => 'success',
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'error',
                'errors' => 'Unauthorized',
            ], 422);
        }

        return response()->json(['message' => 'error'], 500);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        if (auth()->user() && auth()->user()->role_id == 1) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'price' => 'required|numeric',
                'short_name' => 'required|string|between:2,100',
                'number' => 'required|numeric',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'slug' => 'required|string|unique:products,slug',
                'description' => 'required|string',
                'material' => 'required|string',
                'category_id' => 'required|numeric',
                'origin_id' => 'required|numeric',

            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $path = $request->thumbnail->store('images');

            $path = str_replace("images/", "", $path);

            $product = Product::create([
                'name' => $request['name'],
                'price' => $request['price'],
                'short_name' => $request['short_name'],
                'number' => $request['number'],
                'thumbnail' => $path,
                'slug' => $request['slug'],
                'description' => $request['description'],
                'material' => $request['material'],
                'category_id' => $request['category_id'],
                'origin_id' => $request['origin_id'],
            ]);

            if ($product) {
                return response()->json([
                    'message' => 'success',
                    'product' => $product,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'error',
                ], 500);
            }
        } else {

            return response()->json([
                'message' => 'error',
                'errors' => 'Unauthorized',
            ], 422);
        }

        return response()->json(['message' => 'error'], 404);
    }

    public function update(Request $request)
    {
        if (auth()->user() && auth()->user()->role_id == 1) {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required|numeric|exists:products,id',
                'name' => 'string',
                'price' => 'numeric',
                'short_name' => 'string|between:2,100',
                'number' => 'numeric',
                'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
                'slug' => ['string', Rule::unique('products')->ignore($request->product_id), 'alpha_dash'],
                'description' => 'string',
                'material' => 'string',
                'category_id' => 'numeric',
                'origin_id' => 'numeric',

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $product = Product::find($request->product_id);
            $product->update($request->all());

            if ($product->update($request->all())) {
                return response()->json([
                    'message' => 'success',
                    'product' => $product,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'error',
                ], 500);
            }
            return response()->json($product);

        } else {

            return response()->json([
                'message' => 'error',
                'errors' => 'Unauthorized',
            ], 422);
        }
    }
}
