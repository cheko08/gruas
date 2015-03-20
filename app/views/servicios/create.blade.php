@extends('layout.main')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Agrega un Servicio</h3>
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
		<form class="form" role="form" action="{{ URL::route('create-servicio-post') }}" method="post">

			<div class="{{ $errors->has('tipo') ? 'form-group has-error' : 'form-group' }}">
				<label>Tipo de servicio</label>
				<input class="form-control" type="text" name="tipo"
				{{ Input::old('tipo') ? 'value="'.e(Input::old('tipo')).'"':'' }}>
				@if($errors->has('tipo'))
				{{ $errors->first('tipo') }}
				@endif
			</div>
			


              
           	<div class="{{ $errors->has('descripcion') ? 'form-group has-error' : 'form-group' }}">
				<label>Descripción del servicio</label>
				<input class="form-control" type="text" name="descripcion"
				{{ Input::old('descripcion') ? 'value="'.e(Input::old('descripcion')).'"':'' }}>
				@if($errors->has('descripcion'))
				{{ $errors->first('descripcion') }}
				@endif
			</div>
     			


			<div class="form-group">
				<button type="submit" class="btn btn-primary">Agregar Servicio</button>
			</div>
			{{ Form::token() }}
		</form>

	</div>
</div>

@stop