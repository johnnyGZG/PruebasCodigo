@extends("layouts.app");

@section("content")

	<div class="content text-center">
		<div class="card producto text-left">

			@if( Auth::check() && $producto->user_id == Auth::user()->id )

				<div class="absolute actions">
					<a href="{{ url('/productos/'.$producto->id.'/edit') }}">
						Ediar
					</a>
					@include("/productos.eliminar", ["producto" => $producto])
				</div>

			@endif

			<h1>{{ $producto->titulo }}</h1>
			<div class="row">
				<div class="col-sm-6 col-xs-12"></div>
				<div class="col-sm-6 col-xs-12">
					<p>
						<strong>Descripción</strong>
					</p>
					<p>
						{{ $producto->descripcion }}
					</p>
					<p>
						<a href="" class="btn btn-success">
							Agregar al carrito
						</a>
					</p>
				</div>
			</div>
		</div>
	</div>

@endsection