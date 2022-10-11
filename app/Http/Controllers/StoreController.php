<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * @Route("/store/inventory")
     * 
     * An API to get all store with its inventory information
     */
    public function storeInventory(): JsonResponse {
        return response()->json([
            "data" => \App\Models\Store::with([
                'address',
                'manager',
                'inventory' => function ($query) {
                    $query->orderBy('last_update', 'DESC')->take(10)->get();
                },
                'inventory.film'
            ])->get()
        ]);
    }
}
