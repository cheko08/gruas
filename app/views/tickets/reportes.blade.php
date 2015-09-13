@extends('layout.main')
@section('content')

<div class="container">
	<h1>Reportes</h1>
	<form action="{{URL::route('historial-reportes')}}" method="post" accept-charset="utf-8">

		<div class="row">
			<div class="col-xs-4">
				<div class="form-group">
					<label>Fecha de Inicio</label>
					<input type="date" name="fecha_inicio" class="form-control" required>
				</div>

			</div>
			<div class="col-xs-4">
				<div class="form-group">
					<label>Fecha de Término</label>
					<input type="date" name="fecha_termino" class="form-control" required>
				</div>

			</div>
			<div class="col-xs-4">
				<div class="radio">
					<label>
						<input type="radio" name="tipo_servicio" id="reportes1" value="historial" checked>
						Historial de servicios
					</label>
				</div>

				<div class="radio">
					<label>
						<input type="radio" name="tipo_servicio" id="reportes2" value="historial_operador">
						Historial de servicios por operador
					</label>
				</div>
				<div class="form-group">
					{{ Form::select('operador', Operador::lists('nombre', 'id'),
					null, array('class' => 'form-control','id' => 'reporte_operadores')) }}
				</div>



				

				<div class="radio"><label>
					<input type="radio" name="tipo_servicio" id="reportes3" value="historial_maquina">
					Historial de servicios por Vehículo
				</label></div>

				<div class="form-group">
					{{ Form::select('vehiculo', Vehiculo::lists('nombre', 'id'),
					null, array('class' => 'form-control','id' => 'reporte_vehiculos')) }}
				</div>

			</div>
		</div>
		<button type="submit" class="btn btn-success">Generar Reporte</button>




	</form>

</div> <!-- end container -->



@stop