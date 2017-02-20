@extends("layouts.app");

@section("content")

	<div class="container white">
		<h1>Nuevo Producto</h1>
		@include('productos.formulario', ['producto' => $producto, 'url' => '/productos', 'method' => 'POST' ])
	</div>

@endsection