@extends('layout.main')
@section('content')





<div class="container">

	<h3>Clientes</h3>

	<div class="container">
	<form class="form-inline" action="{{ URL::route('ver-clientes') }}" method="get">
			<div class="form-group">

				<div class="input-group">
					<div class="input-group-addon">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</div>
					<input  type="text" class="form-control" 
					name="razon_social" placeholder="Razón Social">
				</div>
				<input type="submit" class="btn btn-primary" name="search" value="Buscar">
			</div>

		</form>	
	</div>


	<table class="table table-striped table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Razón Social</th>
				<th>RFC</th>
				<th>Email</th>
				<th>Dirección</th>
				<th>Ciudad</th>
				<th>Teléfono</th>
				@if(Auth::user()->role === 'Admin' )
                <th></th>
                <th></th>

				@endif
			</tr>
		</thead>
		<tbody>
			@foreach($clientes as $cliente)
			<tr>
				<td>{{$cliente->id}}</td>
				<td>{{$cliente->razon_social}}</td>
				<td>{{$cliente->rfc}}</td>
				<td>{{$cliente->email}}</td>
				<td>{{$cliente->calle.' '.$cliente->numero_ext.' '.$cliente->colonia}}</td>
				<td>{{$cliente->ciudad}}</td>
				<td>{{$cliente->telefono}}</td>
				@if(Auth::user()->role === 'Admin' )
                <td>
                	<a href="{{ URL::route('cliente-actualizar', $cliente->id) }}">
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</a>
                </td>
                <td>
                	<a href="{{ URL::route('cliente-borrar', $cliente->id) }}">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				</a>
                </td>

				@endif
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $clientes->links() }}
</div>


@stop