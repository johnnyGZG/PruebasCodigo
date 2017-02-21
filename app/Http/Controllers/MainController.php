<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

use App\shopping_carts;

class MainController extends Controller{

	public function home(){

		$shopping_cart_id = \Session::get('shopping_cart_id');

		$shopping_cart = shopping_carts::finOrCreateBySessionID($shopping_cart_id);

		\Session::put("shopping_cart_id", $shopping_cart->id);

		return view('main.home', ["shopping_cart" => $shopping_cart]);
	}

}