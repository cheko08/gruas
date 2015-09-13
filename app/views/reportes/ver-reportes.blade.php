@extends('layout.main')

@section('content')

<div class="container">
<h2>Reportes del ticket #{{$ticket->id}}</h2>
<p>Horas estimadas: {{ $ticket->horas_programadas}}</p>



<table class="table table-striped table-condensed">
	<thead>
		<tr>
			<th>Fecha</th>
			<th>Horas</th>
			<th>Agregado por</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

	@foreach($reportes as $reporte)
		<tr>
			<td>{{date("d/m/Y",strtotime($reporte->fecha))}}</td>
			<td>{{$reporte->horas}}</td>
			<td>{{$reporte->user->username}}</td>
			<td>
			<a href="{{ URL::route('borrar-reporte', $reporte->id) }}">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			</a>
			</td>
		</tr>
	@endforeach
	<tr>
		<th>Total</th>
		<td>{{$ticket->horas_reales}}</td>
		<td></td>
		<td></td>
	</tr>
	</tbody>
</table>
<p class="text-right"><a href="{{ URL::route('excel-reportes', $ticket->id) }}" class="btn btn-success btn-xs active" role="button">Exportar a Excel</a></p>
</div>


@stop