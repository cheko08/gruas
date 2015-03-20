@extends('layout.main')
@section('content')


<div class="container">
	<h3>Vehículos</h3>
	
	<table class="table table-condensed table-striped">
		<thead>
			<tr>
				<th>Tipo</th>
				<th>Nombre</th>
				<th>Número económico</th>
				<th>Placas</th>
				<th></th>
				<th></th>

			</tr>
		</thead>
		<tbody>
		@foreach($vehiculos as $vehiculo)
			<tr>
				<td>{{ $vehiculo->tipo }}</td>
				<td>{{ $vehiculo->nombre }}</td>
				<td>{{ $vehiculo->num_economico }}</td>
				<td>{{ $vehiculo->placas }}</td>
				<td><a href="{{ URL::route('vehiculo-editar', $vehiculo->id) }}">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a></td>
				<td>
				<a href="{{ URL::route('vehiculo-borrar', $vehiculo->id) }}">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
				</td>
				
			</tr>
		@endforeach
		</tbody>
	</table>

</div>

@stop