<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(["prefix" => 'store'], function() {
    Route::get('inventory', [\App\Http\Controllers\StoreController::class, 'storeInventory']);
});

Route::post('penjumlahan', fn(Request $request): JsonResponse => response()->json([
    $request->get('angka1') + $request->get('angka2')
]));


"
SELECT * FROM `payment`;
SELECT * FROM `customer`;
SELECT * FROM `staff`;
SELECT * FROM `rental`;
SELECT * FROM `inventory`;
SELECT * FROM `film`;
SELECT * FROM `store`;
SELECT * FROM `address`;
";