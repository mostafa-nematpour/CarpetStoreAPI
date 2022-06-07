<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if (!auth()->user()) {
            return response()->json([
                'message' => 'You must be logged in to access this resource.'
            ], 401);
        }

        $user = $request->user();
        $carts = $user->carts;

        return response()->json([
            'massage' => 'Success',
            'carts' => $carts->makeHidden(['created_at', 'updated_at', 'user_id'])
        ]);
    }


    public function store(Request $request)
    {
        if (!auth()->user()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'number' => 'integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = $request->user();
        $carts = $user->carts;

        foreach ($carts as $cart) {
            if ($cart->product_id == $request->product_id) {

                if ($request->has('number')) {
                    $cart->number = (int) $request->number;
                } else {
                    $cart->number += 1;
                }

                $cart->save();
                $user->load('carts');

                return response()->json([
                    'message' => 'success',
                    'carts' =>  $user->carts->makeHidden(['created_at', 'updated_at', 'user_id'])
                ]);
            }
        }
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $request->product_id;
        if ($request->has('number')) {
            $cart->number = (int) $request->number;
        } else {
            $cart->number = 1;
        }

        if ($cart->save()) {
            $user->load('carts');
            return response()->json([
                'message' => 'success',
                'carts' =>  $user->carts->makeHidden(['created_at', 'updated_at', 'user_id'])
            ]);
        }

        return response()->json([
            'message' => 'error'
        ], 500);
    }

    public function destroy(Request $request)
    {
        if (!auth()->user()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = $request->user();
        $carts = $user->carts;

        foreach ($carts as $cart) {
            if ($cart->product_id == $request->product_id) {
                $cart->delete();
                $user->load('carts');
                return response()->json([
                    'message' => 'success',
                    'carts' => $user->carts
                ]);
            }
        }

        return response()->json([
            'message' => 'error'
        ], 500);
    }

    public  function getCarts($user)
    {
        $user->load('carts');
        return $user->carts->makeHidden(['created_at', 'updated_at', 'user_id']);
    }
}
