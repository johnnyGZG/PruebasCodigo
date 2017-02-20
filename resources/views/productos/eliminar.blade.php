{!! Form::open(["url" => "/productos/".$producto->id, "method" => "DELETE", "class" => "inline-block" ]) !!}
	<input type="submit" value="Eliminar" class="btn btn-link red-text no-padding no-margin" />
{!! Form::close() !!}