<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearProductosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Realizar Cambios

        Schema::create('productos', function(Blueprint $tabla)
        {
            $tabla->increments("id"); // Valor autoincrementable

            $tabla->integer("user_id")->unsigned()->index();
            $tabla->string("titulo");
            $tabla->text("descripcion");
            $tabla->decimal("precio",9,2); //centavos

            $tabla->timestamps(); // Fecha Creacion y actualizacion
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
        Schema::drop('productos');
    }
}
