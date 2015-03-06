@extends('layout.main')
@section('content')

<div class="jumbotron homepage">

	<div class="container">
	<p>Escoge tipo de grúa para crear el ticket de salida</p>
		
	@if(Auth::user()->role === 'Tickets' || Auth::user()->role === 'Admin')
	
	@foreach($gruas as $grua)

	<a class="btn btn-primary btn-lg" href="{{ URL::route('create-ticket',$grua->tipo) }}" role="button">Grúa tipo {{ $grua->tipo }}</a>
	
	@endforeach
	

	</div>
	<!-- end container -->
</div>
<!-- end jumbotron -->

	<div class="container">
	<h1>Tickets abiertos</h1>
	<table class="table table-striped table-condensed">
	<thead>
		<tr>
			<th>Folio</th>
			<th>Hora de salida</th>
			<th>Horas estimadas</th>
			<th>Cliente</th>
			<th>Operador</th>
			<th>Grúa</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	@foreach($tickets as $ticket)
	<tr>
		<td>000{{ $ticket->id }}</td>
		<td>{{ $ticket->hora_salida }}</td>
		<td>{{ $ticket->horas_programadas }}</td>
		@foreach($ticket->clientes as $cliente)
		<td>{{ $cliente->nombre." ".$cliente->apellidos }}</td>
		@endforeach
		@foreach($ticket->operadores as $operador)
		<td>{{ $operador->referencia."-".$operador->nombre." ".$operador->apellido_paterno }}</td>
		@endforeach
		@foreach($ticket->gruas as $grua)
		<td>{{ $grua->tipo."-".$grua->nombre}}</td>
		@endforeach
		<td><button class="btn btn-default btn-sm">Cerrar ticket</button></td>
	</tr>

@endforeach
</tbody>
	</table>
	</div>
@endif
@stop