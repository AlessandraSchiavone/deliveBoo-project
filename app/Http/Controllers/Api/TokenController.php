<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendOrderReceivedMail;
use App\Mail\SendOrderSendMail;
use App\Restaurant;


class TokenController extends Controller
{
    public function index(Request $request)
    {
        // $clientToken = $gateway->clientToken()->generate([
        //     "customerId" => $aCustomerId
        // ]);
        $braintree = config('braintree');
        $clienttoken = $braintree->clientToken()->generate();
        return $clienttoken;

    }
    public function post(Request $request)
    {
        $request->validate([
            'payer_name' => 'required | max:100',
            'payer_surname' => 'required | max:100',
            'payer_address' => 'required | max:100',
            'payer_email' => 'required | email | max:100',
        ]);

        //dd($request);
        // $to = $request->email;

        $cart = json_decode(request('cart'));
        $total = (float) $request->orderTotal;
        $slug = $request->restaurantSlug;
        $nonceFromTheClient = $request->payment_method_nonce;
        $braintree = config('braintree');
        $result = $braintree->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $nonceFromTheClient,
        ]);
        if ($result->success) {
          
            $newOrder = new Order;
            $newOrder->total = $total;
            $newOrder->payer_name = $request->payer_name;
            $newOrder->payer_surname = $request->payer_surname;
            $newOrder->payer_address = $request->payer_address;
            $newOrder->payer_email = $request->payer_email;
            $newOrder->order_date = Carbon::now();
            $newOrder->status = 1;
            $newOrder->save();
  
            foreach ($cart as $product) {
                $newOrder->dishes()->attach($product->dish->id, ['quantity'=> $product->quantita]);
            }

            $restaurant = Restaurant::where('slug', $slug)->first();

            Mail::to('restaurant@mail.it')->send(new SendOrderReceivedMail($newOrder));
            // Mail::to($restaurant->user->email)->send(new SendOrderReceivedMail($newOrder));
            Mail::to('user@mail.it')->send(new SendOrderSendMail);
            // Mail::to($newOrder->payer_email)->send(new SendOrderSendMail);

            //dd($result, 'successo');

            return redirect()->route('checkout');
        } else {

            $newOrder = new Order;
            $newOrder->total = $total;
            $newOrder->payer_name = $request->payer_name;
            $newOrder->payer_surname = $request->payer_surname;
            $newOrder->payer_address = $request->payer_address;
            $newOrder->payer_email = $request->payer_email;
            $newOrder->order_date = Carbon::now();
            $newOrder->status = 0;
            $newOrder->save();

            foreach ($cart as $product) {
                $newOrder->dishes()->attach($product->dish->id, ['quantity'=> $product->quantita]);
            }
  
        

            //dd($result, 'fallimento');
            return redirect()->route('checkoutf');

        }



    }

}


    
