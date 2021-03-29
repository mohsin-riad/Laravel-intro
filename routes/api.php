<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ApiController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

#Product
Route::get('products', [ProductController::class, 'products']);
Route::post('insert-product', [ProductController::class, 'insert']);
Route::get('product/{id}', [ProductController::class, 'getProductById']);

#User
Route::get('employees', [ApiController::class, 'employees']);
Route::post('insert-employees', [ApiController::class, 'insert']);
Route::get('get-employee/{id}', [ApiController::class, 'edit']);
Route::post('update-employees', [ApiController::class, 'update']);