<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cuisine;

class CuisineController extends Controller
{
    public function index() {
        $cuisines = Cuisine::paginate(6);

        // $result = [
        //     'success' => true,
        //     'cuisines' => $cuisines
        // ];

        return response()->json($cuisines);
    }
}
