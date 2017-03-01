<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("in_shopping_carts", function(Blueprint $tabla)
        {
            $tabla->increments("id");

            $tabla->integer("product_id")->unsigned();
            $tabla->integer("shopping_cart_id")->unsigned();

            // Crea llaves foraneas para relacionar tablas entre si de la base de datos
            $tabla->foreign("product_id")->references("id")->on("productos");
            $tabla->foreign("shopping_cart_id")->references("id")->on("shopping_carts");

            $tabla->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // revertir los mismos cambios
        Schema::drop("in_shopping_carts");
    }
}
