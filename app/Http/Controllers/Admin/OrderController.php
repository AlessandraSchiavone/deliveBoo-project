<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Dish;
use App\Order;
use App\Restaurant;

class OrderController extends Controller
{

    public function index()
    {
            if (Auth::user()) {
                // faccio un join di più tabelle essendo quella ordini non direttamente collegata all'id ristorante
                $userOrders = DB::table('orders')
                    ->join('dish_order', 'orders.id', '=', 'dish_order.order_id')
                    ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
                    ->join('restaurants', 'dishes.restaurant_id', '=', 'restaurants.id')
                    ->join('users', 'restaurants.user_id', '=', 'users.id')
                    ->where('restaurants.user_id', "=", Auth::user()->id)
                    ->select('orders.id')
                    ->groupBy('orders.id')
                    ->get()
                    ->toArray();

                // trasformo in array e assegno un id a ogni ordine
                $ids = [];
                foreach ($userOrders as $order) {
                    $ids[] = $order->id;
                }
         
                //creo l'istanza del modello ordine e li filtro in ordine discendente
                $orders = Order::with('dishes')
                ->orderByDesc('id')
                ->findOrFail($ids);
                // return view('admin.orders.index', compact('userAuth', 'orders'));
                return view('admin.orders.index', compact('orders'));
            } else {
                return redirect()->route('restaurants.index');
            }

    }
}
