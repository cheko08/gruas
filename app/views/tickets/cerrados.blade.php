@extends('layout.main')
@section('content')


<div class="container">
	<h1>Tickets Cerrados</h1>
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
				
			</tr>
		</thead>
		<tbody>
			@foreach($tickets as $ticket)
			<tr>
				<td><a href="{{ URL::route('imprimir-ticket', $ticket->id ) }}" title="">0{{ $ticket->id }}</a></td>
				<td>{{ date("d/m/Y",strtotime($ticket->fecha_salida))}}</td>
				<td>{{ $ticket->hora_salida }}</td>
				<td>{{ $ticket->horas_programadas }}</td>
				<td>{{ $ticket->cliente->nombre." ".$ticket->cliente->apellidos }}</td>
				<td>{{ $ticket->operador->referencia."-".$ticket->operador->nombre." ".$ticket->operador->apellido }}</td>
				<td>{{ $ticket->servicio->tipo." - ".$ticket->vehiculo->nombre}}</td>
			</tr>

			@endforeach
		</tbody>
	</table>
	{{ $tickets->links() }}
</div>

@stop