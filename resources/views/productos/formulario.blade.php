{!! Form::open(['url' => $url, 'method' => $method ]) !!}

	<div class="form-group">
		{{ Form::text('Titulo', $producto->titulo, ['class' => 'form-control', 'placeholder' => 'Titulo...']) }}
	</div>

	<div class="form-group">
		{{ Form::number('Precio', $producto->precio, ['class' => 'form-control', 'placeholder' => 'Precio de tu producto']) }}
	</div>

	<div class="form-group">
		{{ Form::textarea('Descripcion', $producto->descripcion, ['class' => 'form-control', 'placeholder' => 'Describe tu producto']) }}
	</div>

	<div class="form-group text-right">
		<a href="{{ url('/productos') }}">Regresar al listado de productos</a>

		<input type="submit" value="Enviar" class="btn btn-success"/>
	</div>

{!! Form::close() !!}