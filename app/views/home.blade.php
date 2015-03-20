@extends('layout.main')
@section('content')

<div class="jumbotron homepage">

	<div class="container">
		<p>Escoge tipo de servicio para crear el ticket de salida</p>
		
		@if(Auth::user()->role === 'Tickets' || Auth::user()->role === 'Admin')

		@foreach($servicios as $servicio)

		<a class="btn btn-primary btn-lg" href="{{ URL::route('create-ticket',$servicio->id) }}" role="button">{{ $servicio->tipo }}</a>

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
				<th>ID</th>
				<th>Fecha de salida</th>
				<th>Hora de salida</th>
				<th>Horas estimadas</th>
				<th>Cliente</th>
				<th>Operador</th>
				<th>Servicio y vehículo</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($tickets as $ticket)
			<tr>
				<td><a href="{{ URL::route('imprimir-ticket', $ticket->id ) }}">0{{ $ticket->id }}</a></td>
				<td>{{ date("d/m/Y",strtotime($ticket->fecha_salida))}}</td>
				<td>{{ $ticket->hora_salida }}</td>
				<td>{{ $ticket->horas_programadas }}</td>
				<td>{{ $ticket->cliente->nombre." ".$ticket->cliente->apellidos }}</td>
				<td>{{ $ticket->operador->referencia."-".$ticket->operador->nombre." ".$ticket->operador->apellido }}</td>
				<td>{{ $ticket->servicio->tipo." - ".$ticket->vehiculo->nombre}}</td>
				<td>
				<a href="{{ URL::route('agregar-reporte', $ticket->id ) }}" class="btn btn-success btn-sm">Agregar reporte</a>
				</td>
				<td>
				<a href="{{ URL::route('cerrar-ticket', $ticket->id ) }}" class="btn btn-default btn-sm">Cerrar ticket</a>
				</td>
				<td>
				<a href="{{ URL::route('ticket-editar', $ticket->id) }}">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
@endif
@stop