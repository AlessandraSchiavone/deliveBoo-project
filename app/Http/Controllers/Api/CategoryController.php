<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        // $result = [
        //     'success' => true,
        //     'categories' => $categories
        // ];

        return response()->json($categories);
    }
}
