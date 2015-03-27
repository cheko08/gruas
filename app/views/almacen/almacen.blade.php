@extends('layout.main')
@section('content')

<div class="container">
	<h2>Almacén</h2>

	<table class="table table-condensed table-striped">
		<thead>
			<tr>
				<th>Ticket ID</th>
				<th>Fecha Salida</th>
				<th>Hora Salida</th>
				<th>Status</th>
				<th>Operador</th>
				<th>Salida</th>
				<th>Recibir</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tickets as $ticket)
			@if($ticket->status_comentarios != '')
			<tr class="info">
			@else
			<tr>
			@endif
				<td>{{ $ticket->id }}</td>
				<td>{{ date("d/m/Y",strtotime($ticket->fecha_salida))}}</td>
				<td>{{ $ticket->hora_salida }}</td>
				<td>{{ $ticket->status }}</td>
				<td>{{ $ticket->operador->referencia.' - '.$ticket->operador->nombre.'  '.$ticket->operador->apellido}} </td>
				<td>
					<a href="{{URL::route('salida-herramientas', $ticket->id)}}" title="Salida de herramientas">
					<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
					</a>
				</td>
				<td>
					<a href="{{URL::route('entrada-herramientas', $ticket->id)}}" title="Recibir Herramientas">
						<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop