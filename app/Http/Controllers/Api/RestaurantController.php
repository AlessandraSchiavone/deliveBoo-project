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

        $restaurants->each(function ($restaurant) {
            if(!$restaurant->img) {
                $restaurant->img = url('images/restaurantplaceholder.png');
            }
        });

        

        return response()->json($restaurants);
    }
}
