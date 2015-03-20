@extends('layout.main')
@section('content')

<div class="panel panel-default">

	<div class="panel-heading">
		<h3 class="panel-title">Ticket de Salida <small>
			<img src="{{ asset('images/logo.png')  }}" alt="Gruas ordonez" class="pull-right img-responsive ticket-imprimir"></small></h3>
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


				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="Folio">ID</label>
							<input type="text" class="form-control"  value="{{ $id }} " readonly>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="Tipo">Folio</label>
							<input type="text"  class="form-control"  value="{{ $ticket->folio }} "readonly>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="Tipo">Tipo de Servicio</label>
							<input type="text"  class="form-control"  value="{{ $tipo }} " readonly>
						</div>
					</div>
					@if($tipo === 'Lowboy')
					<div class="col-xs-6">
						<div class="form-group">
							<label>Vehículos</label>
							<input type="text" class="form-control"  value="{{ $vehiculo.' - '. $vehiculo_a }} " readonly>
						</div>	
					</div>

					@else
						<div class="col-xs-6">
						<div class="form-group">
							<label>Vehículo</label>
							<input type="text" class="form-control"  value="{{ $vehiculo }} " readonly>
						</div>	
					</div>
					@endif
				</div>
				<div class="row">
					<div class="col-xs-6">

						<div class="form-group">
							<label>Cliente</label>

							<input type="text" class="form-control" 
							value="{{ $cliente->nombre.' '.$cliente->apellidos }} " readonly>

						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label>Empresa</label>

							<input type="text" class="form-control" 
							value="{{ $cliente->empresa}} " readonly>

						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label>Teléfono de contacto</label>

							<input type="text" class="form-control" 
							value="{{ $cliente->telefono}} " readonly>

						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label>Dirección</label>

							<input type="text" class="form-control" 
							value="{{ $cliente->direccion}} " readonly>

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label>Fecha y hora de inicio</label>

							<input type="text" class="form-control" 
							value="{{date("d/m/Y",strtotime($ticket->fecha_salida)).' - '. $ticket->hora_salida}} " readonly>

						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label>Fecha y hora estimada de término</label>

							<input type="text" class="form-control" 
							value="{{date("d/m/Y",strtotime($ticket->fecha_est_entrada)).' - '. $ticket->hora_est_entrada}} " readonly>

						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label>Fecha de término</label>

							<input type="text" class="form-control" 
							value="{{$ticket->fecha_entrada}} " readonly>

						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label>Hora de término</label>

							<input type="text" class="form-control" 
							value="{{$ticket->hora_entrada}} " readonly>

						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label>Horas programadas</label>

							<input type="text" class="form-control" 
							value="{{ $ticket->horas_programadas}} " readonly>

						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label>Horas Reales</label>

							<input type="text" class="form-control" id="a1" 
							value="{{ $ticket->horas_reales}} " readonly>

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label>El ticket se levantó</label>

							<input type="text" class="form-control" 
							value="{{ strtoupper ($ticket->status_lugar) }} " readonly>

						</div>

					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label>Operador</label>
							@foreach($ticket->operadores as $operador)
							<input type="text" class="form-control" 
							value="{{ $operador->referencia."-".$operador->nombre." ".$operador->apellido}} " readonly>
							@endforeach
						</div>

					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">

						<div class="form-group">
							<label>Precio por hora</label>
							<div class="input-group">
								<div class="input-group-addon">$</div>
								<input id="a2" type="text" class="form-control" 
								value="{{ $ticket->costo }}" name="precio" readonly >
							</div>
						</div>
					</div>

					<div class="col-xs-6">

						<div class="form-group">
							<label>Precio total</label>
							<div class="input-group">
								<div class="input-group-addon">$</div>
								<input type="text" class="form-control" id="a3" 
								value="{{ $ticket->costo_total }}" name="precio_total" readonly >
							</div>
						</div>
					</div>
				</div>
				@if($ticket->status === 'Cerrado' && Auth::user()->role === 'Admin')
				<div class="row">
					<div class="col-xs-6">

						<div class="form-group">
							<label>Precio especial hora</label>
							<div class="input-group">
								<div class="input-group-addon">$</div>
								<input id="a4" type="text" class="form-control" 
								value="{{ $ticket->costo_especial }}" name="precio_especial" >
							</div>
						</div>
					</div>

					<div class="col-xs-6">

						<div class="form-group">
							<label>Precio especial total</label>
							<div class="input-group">
								<div class="input-group-addon">$</div>
								<input type="text" class="form-control" id="a5" 
								value="" name="precio_total" readonly >
							</div>
						</div>
					</div>
				</div>

				@endif

				<div class="form-group">
					<label for="Comentarios">Notas Adicionales</label>
					<textarea name="comments" readonly rows="3" class="form-control">{{ $ticket->descripcion }}</textarea>
				</div>
			</div>
			<button  class="btn btn-primary" onclick="javascript:window.print()" >Imprimir Ticket</button>

			@if($ticket->status === 'Cerrado' && Auth::user()->role === 'Admin')
			<button type="submit" class="btn btn-success">Cambiar Precio</button>
			
	

			@endif
		</div>

		@stop