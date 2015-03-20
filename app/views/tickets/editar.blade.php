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

		<form method="post" action="{{URL::route('post-editar-ticket')}}">
			<input type="hidden" value="{{ $ticket->id }}" name="id">
				
			<div class="form-group">
				<label>Vehículo</label>
				<select class="form-control" name="vehiculo">
					<option value="{{ $ticket->vehiculo }}" selected="selected">{{ $ticket->vehiculo }}</option>
					@foreach($vehiculos as $vehiculo)
					<option value="{{ $vehiculo->nombre }}">{{$vehiculo->num_economico.' - '. $vehiculo->nombre }}</option>
					@endforeach
				</select>
			</div>
			@if($ticket->servicio_id == 11)
			<div class="form-group">
				<label>Adicional</label>
				<select class="form-control" name="vehiculo_adicional">
					<option value="{{ $ticket->vehiculo_adicional }}" selected="selected">{{ $ticket->vehiculo_adicional }}</option>
					@foreach($vehiculos_a as $vehiculo)
					<option value="{{ $vehiculo->nombre }}">{{ $vehiculo->nombre }}</option>
					@endforeach
				</select>
			</div>
			@endif
			


	
			<div class="form-group">
				<label for="Operador">Operador</label>
					<select class="form-control" name="operador">
					<option value="{{ $op_id }}" selected="selected">{{$op.' '.$op_a}}</option>
					@foreach($operadores as $operador)
					<option value="{{ $operador->id }}">{{ $operador->nombre.' '.$operador->apellido }}</option>
					@endforeach
				</select>
			</div>

			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label>Fecha de salida </label>
						<input id="date" type="date" class="form-control" name="fecha"
						value="{{ $ticket->fecha_salida }}">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label>Hora de salida</label>
						<input id="time" type="time" class="form-control" name="hora"
						value="{{ $ticket->hora_salida }}">
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label>Fecha estimada término </label>
						<input id="date" type="date" class="form-control" name="fecha_est_entrada" value="{{ $ticket->fecha_est_entrada }}">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label>Hora estimada término</label>
						<input id="time" type="time" class="form-control" name="hora_est_entrada" value="{{ $ticket->hora_est_entrada }}">
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="Horas">Tiempo estimado en horas</label>
						<input type="number" min="0" step=".5" class="form-control" name="horas_estimadas" value="{{ $ticket->horas_programadas }}">
					</div>
				</div>
				
			</div>

			



			<div class="form-group">
				<label for="Comentarios">Descripción del servicio</label>
				<textarea name="comments" rows="3" class="form-control">{{ $ticket->descripcion}}</textarea>
			</div>
			{{ Form::token() }}

			<button type="submit" class="btn btn-primary">Editar Ticket</button>

		</form>

	</div>
</div>



@stop