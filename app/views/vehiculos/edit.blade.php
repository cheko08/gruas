@extends('layout.main')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Edita el Vehículo</h3>
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
		<form class="form" role="form" action="{{ URL::route('edit-vehiculo-post') }}" method="post">

			<div class="form-group">
				<label>Tipo de servicio</label>
				<select class="form-control" name="servicio">
				<option value="{{ $vehiculo->tipo }}" selected="selected">{{ $vehiculo->tipo }}</option>
				<option value="Adicional">Adicional</option>
					@foreach($servicios as $servicio)
					<option value="{{ $servicio->tipo }}">{{ $servicio->tipo }}</option>
					@endforeach
				</select>
			</div>
			

			<input type="hidden" value="{{ $vehiculo->id }}" name="id">
              
           	<div class="{{ $errors->has('nombre') ? 'form-group has-error' : 'form-group' }}">
				<label>Descripción Vehículo</label>
				<input class="form-control" type="text" name="nombre"
				{{ Input::old('nombre') ? 'value="'.e(Input::old('nombre')).'"':'value="'.$vehiculo->nombre.'".' }}>
				@if($errors->has('nombre'))
				{{ $errors->first('nombre') }}
				@endif
			</div>


			<div class="row">
				<div class="col-xs-6">
					<div class="form-group">
				<label>Número económico</label>
				<input class="form-control" type="text" name="num-economico"
				{{ Input::old('num-economico') ? 'value="'.e(Input::old('num-economico')).'"':'value="'.$vehiculo->num_economico.'".' }}>
			</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group">
				<label>Placas</label>
				<input class="form-control" type="text" name="placas"
				{{ Input::old('placas') ? 'value="'.e(Input::old('placas')).'"':'value="'.$vehiculo->placas.'".'}}>
			</div>
				</div>
			</div>

			

			
     			


			<div class="form-group">
				<button type="submit" class="btn btn-primary">Editar Vehículo</button>
			</div>
			{{ Form::token() }}
		</form>

	</div>
</div>

@stop