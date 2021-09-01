<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Dish;
use App\Category;
use App\Restaurant;

class DishController extends Controller
{
    private $dishValidationArray = [
        'name' => 'required | string | max:255 ',
        'description' => 'nullable | max:500',
        'img' => 'nullable | mimes:jpg,png,jpeg | max:500',
        'price' => 'required | max:999',
        // 'gluten_free'=>'nullable|exists:dishes,gluten_free',
        // 'vegetarian'=>'nullable|',
        // 'vegan'=>'nullable|exists:dishes,vegan',
        // 'availability'=>'nullable|exists:dishes,availability',
        'category_id' => 'required|exists:categories,id',
    ];

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {

        $dishes = dish::where('restaurant_id', $restaurant->id)->get();

        return view('admin.dishes.index', compact('dishes', 'restaurant'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Restaurant $restaurant)
    {
        $categories= Category::all();
        return view('admin.dishes.create', compact('categories', 'restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Restaurant $restaurant )
    {
        $data = $request -> all();
        
        $request -> validate($this->dishValidationArray);
        $newDish = new Dish();
        $newDish->restaurant_id = $restaurant->id;
        $slug = Str::slug($data['name'],"-") ."-".$restaurant->id;
        $data["slug"] = $slug;
         //upload file
         if(array_key_exists('img', $data)){
            //sta salvando il percorso relativo del file
            $data['img'] = Storage::put('dish_imgs', $data['img']);
        }
        if(array_key_exists('gluten_free', $data) && $data['gluten_free']== 'on' ){
            $data['gluten_free'] = 1;
        }
        if(array_key_exists('vegetarian', $data) && $data['vegetarian']== 'on' ){
            $data['vegetarian'] = 1;
        }
        if(array_key_exists('vegan', $data) && $data['vegan']== 'on' ){
            $data['vegan'] = 1;
        }
        if(array_key_exists('availability', $data) && $data['availability']== 'on' ){
            $data['availability'] = 1;
        }else{
            $data['availability'] = 0;
        }
        $newDish-> fill($data);
        $newDish -> save();

        return redirect() -> route('admin.dishes.show', [$restaurant -> id, $newDish->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant, Dish $dish)
    {
        return view("admin.dishes.show", compact('restaurant', 'dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant, Dish $dish)
    {
        $categories= Category::all();
        return view('admin.dishes.edit', compact('categories', 'restaurant','dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant, Dish $dish)
    {
        $data = $request -> all();
        
        $request -> validate($this->dishValidationArray);
        $slug = Str::slug($data['name'],"-") ."-".$restaurant->id;
        $data["slug"] = $slug;
        if(array_key_exists('img', $data)){
            if($dish->img) {
                Storage::delete($dish->img);
            }
            $data['img'] = Storage::put('dish_imgs', $data['img']);
        }
        if(array_key_exists('gluten_free', $data) && $data['gluten_free']== 'on' ){
            $data['gluten_free'] = 1;
        }else{
            $data['gluten_free'] = 0;
        }
        if(array_key_exists('vegetarian', $data) && $data['vegetarian']== 'on' ){
            $data['vegetarian'] = 1;
        }else{
            $data['vegetarian'] = 0;
        }
        if(array_key_exists('vegan', $data) && $data['vegan']== 'on' ){
            $data['vegan'] = 1;
        }else{
            $data['vegan'] = 0;
        }
        if(array_key_exists('availability', $data) && $data['availability']== 'on' ){
            $data['availability'] = 1;
        }else{
            $data['availability'] = 0;
        }
        $dish -> update($data);

        return redirect() -> route('admin.dishes.show', [$restaurant -> id, $dish->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant, Dish $dish )
    {
        if($dish->img) {
            Storage::delete($dish->img);
        }
        $dish -> delete();
        
         
        return redirect()
        ->route('admin.dishes.index', $restaurant -> id )
        ->with('deleted', $dish->name);
    }
}
