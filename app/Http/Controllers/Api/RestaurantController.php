<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index() {
        $restaurants = Restaurant::all();
            // ->with('cuisines')->first();

        // $result = [
        //     'success' => true,
        //     'restaurants' => $restaurants
        // ];

        return response()->json($restaurants);
    }
}