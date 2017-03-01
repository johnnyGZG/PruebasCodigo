<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\shopping_carts;

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //inyectar valiables a las vistas
        view()->composer('*', function($view){

            $shopping_cart_id = \Session::get('shopping_cart_id');

            $shopping_cart = shopping_carts::finOrCreateBySessionID($shopping_cart_id);

            \Session::put("shopping_cart_id", $shopping_cart->id);

            $view->with("shopping_cart", $shopping_cart);

        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
