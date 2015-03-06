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
				<label for="Tipo">Tipo de Grúa</label>
				<input type="text" name="tipo" class="form-control"  value="{{ $tipo }} " readonly>
			</div>

			<div class="form-group">
				<select class="form-control" name="grua">
					@foreach($gruas as $grua)
					<option value="{{ $grua->id }}">{{ $grua->nombre }}</option>
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<label for="cliente">Cliente</label>
				<select class="form-control" name="cliente">
					@foreach($clientes as $cliente)
					<option value="{{ $cliente->id }}">
						{{ $cliente->nombre.' '.$cliente->apellidos.' - Empresa: '.$cliente->empresa }}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="Operador">Operador</label>
				{{ Form::select('operador', Operador::lists('nombre', 'id'),
				null, array('class' => 'form-control')) }}	
			</div>


			<div class="form-group">
				<label for="Horas">Tiempo estimado en horas</label>
				<input type="number" min="0" step=".5" class="form-control" name="horas_estimadas">
			</div>

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

			<div class="form-group">
				<label for="Comentarios">Notas Adicionales</label>
					<textarea name="comments" rows="3" class="form-control"></textarea>
			</div>
{{ Form::token() }}
			 <button type="submit" class="btn btn-primary">Crear Ticket</button>
		</form>

	</div>
</div>

@stop