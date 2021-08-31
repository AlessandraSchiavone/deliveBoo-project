<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Restaurant;
use App\Cuisine;


class RestaurantController extends Controller
{
    private $restaurantValidationArray = [
        'name' => 'required | string | max:255 ',
        'description' => 'nullable | max:500',
        'phone_number' => 'required | max:20',
        'img' => 'nullable | mimes:jpg,png,jpeg | max:500',
        'location' => 'required | max:30',
        'opening_time' => 'nullable | max:20',
        'closure_time' => 'nullable | max:20',
        'price_shipping' => 'nullable | max:5',
        'cuisines' => 'exists:cuisines,id',
    ];
    private $updateRestaurantValidationArray = [
        'description' => 'nullable | max:500',
        'img' => 'nullable | mimes:jpg,png,jpeg | max:500',
        'location' => 'required | max:30',
        'opening_time' => 'nullable | max:20',
        'closure_time' => 'nullable | max:20',
        'price_shipping' => 'nullable | max:5',
    ];
    private function generateSlug($data){
        $slug = Str::slug($data["name"],'-');

        $existingRestaurant  = Restaurant::where('slug', $slug)->first();
        $slugBase = $slug;
        $count = 1;

        while ($existingRestaurant){
           $slug = $slugBase . "-". $count;

           $existingRestaurant  = Restaurant::where('slug', $slug)->first();
           $count++;
        }
        return $slug;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();

        return view('admin.restaurants.index', compact('restaurants'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuisines= Cuisine::all();
        return view('admin.restaurants.create', compact('cuisines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request -> all();
        $request -> validate($this->restaurantValidationArray);
        $newRestaurant = new Restaurant();
        $slug = $this -> generateSlug($data);
        

        $data["slug"] = $slug;
        //upload file
        if(array_key_exists('img', $data)){
            //sta salvando il percorso relativo del file
            $data['img'] = Storage::put('restaurant_imgs', $data['img']);
        }

        $newRestaurant-> fill($data);
        $newRestaurant->user_id = Auth::user()->id;
        $newRestaurant -> save();

        if(array_key_exists('cuisines',$data)){
           $newRestaurant -> cuisines()->attach($data["cuisines"]); 
        }
        return redirect() -> route('admin.restaurants.show', $newRestaurant -> id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view("admin.restaurants.show", compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $cuisines = Cuisine::all();
        return view("admin.restaurants.edit", compact('restaurant','cuisines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant )
    {
        $data = $request -> all();
        // dd($data);
        $request -> validate($this->updateRestaurantValidationArray);
        if(array_key_exists('img', $data)) {
            if($restaurant->img) {
                Storage::delete($restaurant->img);
            }

            $data["img"] = Storage::put('restaurant_imgs', $data["img"]);
        }
        $restaurant ->update($data);
        
        
        return redirect()->route('admin.restaurants.show', $restaurant-> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if($restaurant->img) {
            Storage::delete($restaurant->img);
        }
        $restaurant->cuisines()->detach();
        $restaurant -> delete();
        
            
       
        return redirect()
        ->route('admin.restaurants.index')
        ->with('deleted', $restaurant->name);
    }
}
