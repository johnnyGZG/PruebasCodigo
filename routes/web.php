<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@home');

Auth::routes();

Route::resource('productos','ProdutosController');
/*
	Acciones que tomara la ruta resource

	GET / productos => index
	POST / productos => store
	GET / produsctos/create => Formulario para crear

	GET / productos/:id => Mostrar un producto con id
	GET / productos/:id/edit
	PUT/PATCH / productos/:id
	DELETE / productos/:id

*/

Route::get('/home', 'HomeController@index');
