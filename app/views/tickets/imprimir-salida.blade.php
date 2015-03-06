@extends('layout.main')
@section('content')

<div class="panel panel-default">

	<div class="panel-heading">
		<h3 class="panel-title">Ticket de Salida</h3>
	</div>
	<div class="panel-body">
		@if(Session::has('create'))

		<div class="alert alert-info alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('create') }}
		</div>

		@endif
		@if(Session::has('create-error'))

		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('create-error') }}
		</div>
		@endif
		<div id="ticket">
			<div class="form-group">
				<label for="Folio">Folio</label>
				<input type="text" class="form-control"  value="{{ $folio }} " readonly>
			</div>

		<div class="form-group">
				<label for="Tipo">Tipo de Grúa</label>
				<input type="text"  class="form-control"  value="{{ $tipo_grua }} " readonly>
			</div>
		<div class="form-group">
				<label>Grúa</label>
				<input type="text" class="form-control"  value="{{ $grua }} " readonly>
			</div>
			<div class="form-group">
				<label>Cliente</label>

				<input type="text" class="form-control" 
				 value="{{ $cliente->nombre.' '.$cliente->apellidos }} " readonly>

			</div>

			<div class="form-group">
				<label>Empresa</label>

				<input type="text" class="form-control" 
				 value="{{ $cliente->empresa}} " readonly>

			</div>

			<div class="form-group">
				<label>Teléfono de contacto</label>

				<input type="text" class="form-control" 
				 value="{{ $cliente->telefono}} " readonly>

			</div>

			<div class="form-group">
				<label>Horas programadas</label>

				<input type="text" class="form-control" 
				 value="{{ $ticket->horas_programadas}} " readonly>

			</div>

			<div class="form-group">
				<label>Fecha y hora de salida</label>

				<input type="text" class="form-control" 
				 value="{{ $ticket->hora_salida}} " readonly>

			</div>

			<div class="form-group">
				<label>Estatus del ticket</label>

				<input type="text" class="form-control" 
				 value="{{ $ticket->status_lugar}} " readonly>

			</div>


			<div class="form-group">
				<label for="Comentarios">Notas Adicionales</label>
					<textarea name="comments" readonly rows="3" class="form-control">{{ $ticket->descripcion }}</textarea>
			</div>
</div>
			<button  class="btn btn-primary" onclick="javascript:window.print()" >Imprimir Ticket</button>


</div>

@stop