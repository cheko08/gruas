@extends('layout.main')
@section('content')


<div class="container">
	<h3>Servicios</h3>
	
	<table class="table table-condensed table-striped">
		<thead>
			<tr>
				<th>Tipo</th>
				<th>Descripción</th>
				<th></th>

			</tr>
		</thead>
		<tbody>
		@foreach($servicios as $servicio)
			<tr>
				<td>{{ $servicio->tipo }}</td>
				<td>{{ $servicio->descripcion }}</td>
				<td>
				<a href="{{ URL::route('servicio-borrar', $servicio->id) }}">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

</div>

@stop