@extends("layouts.app");

@section("content")

	<div class="big-padding text-center blue-grey white-text">
		<h1>Productos</h1>
	</div>

	<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					<td>ID</td>
					<td>Título</td>
					<td>Descripción</td>
					<td>Precio</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($producto as $productos)
					<tr>
						<td>{{ $productos->id }}</td>
						<td>{{ $productos->titulo }}</td>
						<td>{{ $productos->descripcion }}</td>
						<td>{{ $productos->precio }}</td>
						<td>
							<a href="{{ url('/productos/'.$productos->id.'/edit') }}">
								Ediar
							</a>
							@include("/productos.eliminar", ["producto" => $productos])
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="flotaing">
		<a href="{{ url('/productos/create') }}" class="btn btn-primary btn-fab">
			<i class="material-icons">add</i>
		</a>
	</div>

@endsection