<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Productos;

// Para poder utilizar los datos del usuario
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Moostrar una coleccion de datos
        $productos = Productos::all();
        return view("productos.index", ["producto" => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Muestra el formulario para crear informacion
        $producto = new Productos;
        return view("productos.crear", ['producto' => $producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // es el encargado de resivir lo que envia el formulario de 'create' y guardarlo en la base de datos

        $producto = new Productos; // instanciamos el modelo

        $producto->user_id = Auth::user()->id;
        $producto->titulo = $request->Titulo;
        $producto->descripcion = $request->Descripcion;
        $producto->precio = $request->Precio;
        // trae el id del usuario que esta esta logueado en el momento

        if( $producto->save() ) // Guarda los datos en la bd
        {
            return redirect("/productos"); // redirecciona a otra pagina
        }
        else
        {
            return view("productos.create"); // Vuelve a mostrar una vista
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Muestra el registor perteneciente a un id
        $producto = Productos::find($id); // Busca los datos con el id correspondiente

        return view("productos.show", ["producto" => $producto]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Formulario para editar un datos correspondiente a un id
        $producto = Productos::find($id);
        return view("productos.editar", ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Es el encargado de recivir los datos enviados de edit y despues actualiza los datos que pertenece al id
        $producto = Productos::find($id);

        $producto->titulo = $request->Titulo;
        $producto->descripcion = $request->Descripcion;
        $producto->precio = $request->Precio;
        // trae el id del usuario que esta esta logueado en el momento

        if( $producto->save() ) // Guarda los datos en la bd
        {
            return redirect("/productos"); // redirecciona a otra pagina
        }
        else
        {
           return view("productos.editar", ['producto' => $producto]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Elimina los datos
        Productos::destroy($id);

        return redirect('/productos');
    }
}
