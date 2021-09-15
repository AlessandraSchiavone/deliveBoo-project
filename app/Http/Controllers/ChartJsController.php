<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ChartJsController extends Controller
{   
    public function index(Restaurant $restaurant)
    {    $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];
        if(Auth::user()->id == $restaurant->user->id){
            $userOrders = DB::table('orders')
            ->join('dish_order', 'orders.id', '=', 'dish_order.order_id')
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->join('restaurants', 'dishes.restaurant_id', '=', 'restaurants.id')
            ->join('users', 'restaurants.user_id', '=', 'users.id')
            ->where('restaurants.id', "=", $restaurant->id)
            ->select('orders.id', 'restaurants.name')
            ->groupBy('orders.id', 'restaurants.name')
            ->get()
            ->toArray();
            $ids = [];
            $nameRestaurant = '';
            foreach ($userOrders as $order) {
                $nameRestaurant = $order->name;
            }
            if($restaurant->name == $nameRestaurant ){
                  foreach ($userOrders as $order) {
                    $ids[] = $order->id;
                }
            }
              
              
            
         
            // dd(count($ids));
            $numberOrders = count($ids);
        } else{
            abort(404);
        }
        // dd($prova);
        // $prova->each(function($post){
        //    dd($post->name);
        // });
        
        // $orders = count(Order::all());
        // $orders = Order::with('dishes')
        // ->orderByDesc('id')
        // ->findOrFail($ids);
        // dd($restaurant->name);
        // dump($restaurant->name);
        // dump('user id' . ' ' . Auth::user()->id  . ' = = '  . 'restaurant id' . ' ' . $restaurant->user->id  );
        // dd(Auth::user()->id);
        // dump('numero ordini' . ' ' . $numberOrders);
        // dd($year,JSON_NUMERIC_CHECK);
   
    	return view('admin.chartjs',compact('restaurant'))->with('months', json_encode($months))->with('numberOrders',json_encode($numberOrders),JSON_NUMERIC_CHECK);
    }
}
