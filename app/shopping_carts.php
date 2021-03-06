<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shopping_carts extends Model
{

	protected $fillable = ["estado"];

    public function inShoppingCatrs(){

        // Devuelve todos los registros relacionados con la tabla hace un JOIN
        return $this->hasMany("App\inShoppingCatr");
    }

    public function productos(){
        return $this->belongsToMany("App\Productos", "in_shopping_carts");
    }

	public function productsSize()
	{
		return $this->productos()->count();
	}

    public static function finOrCreateBySessionID($shopping_cart_id)
    {
    	if($shopping_cart_id)
    	{
    		// Buscar el carrito de compras con este ID
    		return shopping_carts::findBySession($shopping_cart_id);
    	}
    	else
    	{
    		// Crear un carrito de compras
    		return shopping_carts::createWithoutSession();
    	}
    }

    // Busca la sesion del carrito de compras del usuario
    public static function findBySession($shopping_cart_id)
    {
    	return shopping_carts::find($shopping_cart_id);
    }

    // Crea carrito de compras
    public static function createWithoutSession()
    {
    	return shopping_carts::create([
    		"estado" => "incompleto"
    	]);
    }
}
