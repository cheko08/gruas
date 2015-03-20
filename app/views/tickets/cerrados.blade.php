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
				@foreach($ticket->clientes as $cliente)
				<td>{{ $cliente->nombre." ".$cliente->apellidos }}</td>
				@endforeach
				@foreach($ticket->operadores as $operador)
				<td>{{ $operador->referencia."-".$operador->nombre." ".$operador->apellido }}</td>
				@endforeach
				@foreach($ticket->servicios as $servicio)
				<td>{{ $servicio->tipo." - ".$ticket->vehiculo}}</td>
				@endforeach
				
			</tr>

			@endforeach
		</tbody>
	</table>
</div>

@stop