@extends('layout.main')
@section('content')


<div class="container">
	<h3>Servicios</h3>
	
	<table class="table table-condensed table-striped">
		<thead>
			<tr>
				<th>Tipo</th>
				<th>Descripción</th>
				@if(Auth::user()->role === 'Admin')
				<th></th>
				@endif

			</tr>
		</thead>
		<tbody>
		@foreach($servicios as $servicio)
			<tr>
				<td>{{ $servicio->tipo }}</td>
				<td>{{ $servicio->descripcion }}</td>
				@if(Auth::user()->role === 'Admin')
				<td>
				<a href="{{ URL::route('servicio-borrar', $servicio->id) }}">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
				</td>
				@endif
			</tr>
		@endforeach
		</tbody>
	</table>

</div>

@stop