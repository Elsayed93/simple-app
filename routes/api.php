<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*
|-------------------------------------------------|
| Products API Routes                             |
|-------------------------------------------------|
*/

// resource Route for Products
Route::resource('/products', ProductsController::class)->except(['create', 'edit']);  // don't need create and edit method in APIs
