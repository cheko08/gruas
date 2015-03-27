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


		<form method="post" action="{{URL::route('post-create-ticket')}}">
			<div class="form-group">
				<label for="Tipo">Tipo de Servicio</label>
				<input type="text" class="form-control"  value="{{ $servicio->tipo }} " readonly>
				<input type="hidden" name="tipo" value="{{ $servicio->id }}">
				
			</div>
				
			<div class="form-group">
				<label>Vehículo</label>
				<select class="form-control" name="vehiculo" required>
					@foreach($vehiculos as $vehiculo)
					<option value="{{ $vehiculo->id }}">{{$vehiculo->num_economico.' - '. $vehiculo->nombre }}</option>
					@endforeach
				</select>
			</div>
			@if($servicio->id == 11)
			<div class="form-group">
				<label>Adicional</label>
				<select class="form-control" name="vehiculo_adicional" required>
					@foreach($vehiculos_a as $vehiculo)
					<option value="{{ $vehiculo->id }}">{{ $vehiculo->nombre }}</option>
					@endforeach
				</select>
			</div>
			@endif
			<div class="form-group">
				<label>Cliente</label>
				<select class="form-control" name="cliente" id="ex-client">
					<option value=""></option>
						
					@foreach($clientes as $cliente)
					<option value="{{ $cliente->id }}">{{ $cliente->nombre.' '.$cliente->apellidos.' - '.$cliente->empresa }}</option>
					@endforeach


				</select>
			</div>


	<button type="button" class="btn btn-success" id="show">Agregar Cliente</button>

		<div id="cliente">
			
	
			<div class="form-group">
				
				<div class="row">
					<div class="col-xs-6">
						<input type="text" placeholder="Nombre" class="form-control" name="nombre">
					</div>
					<div class="col-xs-6">
						<input type="text" placeholder="Apellido" class="form-control" name="apellido">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6">
						<input type="text" placeholder="Empresa" class="form-control" name="empresa">
					</div>
					<div class="col-xs-6">
						<input type="text" placeholder="Teléfono" class="form-control" name="telefono">
					</div>

				</div>
			</div>
			<div class="form-group">
				<input type="text" placeholder="Dirección" class="form-control" name="direccion">
			</div>
</div>
			<div class="form-group">
				<label for="Operador">Operador</label>
				{{ Form::select('operador', Operador::lists('nombre', 'id'),
				null, array('class' => 'form-control')) }}	
			</div>

			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label>Fecha de salida </label>
						<input id="date" type="date" class="form-control" name="fecha" >
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label>Hora de salida</label>
						<input id="time" type="time" class="form-control" name="hora" >
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label>Fecha estimada término </label>
						<input id="date" type="date" class="form-control" name="fecha_est_entrada">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label>Hora estimada término</label>
						<input id="time" type="time" class="form-control" name="hora_est_entrada">
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
						<label for="Horas">Tiempo estimado en horas</label>
						<input type="number" min="0" step=".5" class="form-control" name="horas_estimadas">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
						<label for="Status del Ticket">Estatus del ticket</label>
						<div>
							<label class="radio-inline">
								<input type="radio" name="status_lugar" id="inlineRadio1" value="dentro" checked> Dentro
							</label>
							<label class="radio-inline">
								<input type="radio" name="status_lugar" id="inlineRadio2" value="fuera"> Fuera
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group">
				<label>Tiempo del servicio</label>
				<div>
					<label class="radio-inline">
						<input type="radio" name="tiempo_servicio" id="inlineRadio1" value="año" checked> Año
					</label>
					<label class="radio-inline">
						<input type="radio" name="tiempo_servicio" id="inlineRadio2" value="mes"> Mes
					</label>
					<label class="radio-inline">
						<input type="radio" name="tiempo_servicio" id="inlineRadio3" value="quincena"> Quincena
					</label>
					<label class="radio-inline">
						<input type="radio" name="tiempo_servicio" id="inlineRadio4" value="semana"> Semana
					</label>
					<label class="radio-inline">
						<input type="radio" name="tiempo_servicio" id="inlineRadio5" value="dia"> Día
					</label>
					<label class="radio-inline">
						<input type="radio" name="tiempo_servicio" id="inlineRadio6" value="hora" checked> Hora
					</label>
				</div>
			</div>



			<div class="form-group">
				<label for="Comentarios">Descripción del servicio</label>
				<textarea name="comments" rows="3" class="form-control"></textarea>
			</div>
			{{ Form::token() }}

			<button type="submit" class="btn btn-primary">Crear Ticket</button>

		</form>

	</div>
</div>



@stop