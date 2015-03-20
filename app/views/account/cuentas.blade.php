@extends('layout.main')
@section('content')
<div class="container">
<h2>Cuentas</h2>
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Role</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@foreach($cuentas as $cuenta)
			<tr>
				<td>{{ $cuenta->username }}</td>
				<td>{{ $cuenta->first_name }}</td>
				<td>{{ $cuenta->last_name }}</td>
				<td>{{ $cuenta->role }}</td>
				<td>
				@if(Auth::user()->id === $cuenta->id)
			
				@else
				<a href="{{ URL::route('cuenta-borrar', $cuenta->id) }}">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
				@endif
				
				
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
@stop