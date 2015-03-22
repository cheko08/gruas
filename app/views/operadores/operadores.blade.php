@extends('layout.main')
@section('content')
<div class="container">
<h2>Operadores</h2>
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>Referencia</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th></th>
				@if(Auth::user()->role === 'Admin')
				<th></th>
				@endif
			</tr>
		</thead>
		<tbody>
		@foreach($operadores as $operador)
			<tr>
				<td>{{ $operador->referencia }}</td>
				<td>{{ $operador->nombre }}</td>
				<td>{{ $operador->apellido }}</td>
				<td>
				<a href="{{ URL::route('operador-actualizar', $operador->id) }}">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
				</td>
				@if(Auth::user()->role === 'Admin')
				<td>
				<a href="{{ URL::route('operador-borrar', $operador->id) }}">
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