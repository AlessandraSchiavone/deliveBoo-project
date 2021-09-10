<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // $environment = 'sandbox';
        $braintree = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'hbtc7sjbtbkng5hw',
            'publicKey' => 'wxf2pp825hjdhssw',
            'privateKey' => '236eca58f84ce394b5ff18f9ac690b1d'
        ]);
        config(['braintree' => $braintree]);
    }
}
