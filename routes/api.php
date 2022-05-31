<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Category;
use App\Models\Origin;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{product}', [ProductController::class, 'show']);


Route::post('/add-product', [ProductController::class, 'insert']);
Route::post('/delete-product', [ProductController::class, 'destroy']);

Route::get('/origin', function () {
    return response()->json(Origin::all(['id', 'name']));
});


Route::get('/category', function () {
    return response()->json(Category::all(['id', 'name']));
});



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/user-profile', [AuthController::class, 'userProfile']);
});
