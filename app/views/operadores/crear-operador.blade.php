@extends('layout.main')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Agrega un operador</h3>
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
		<form class="form" role="form" action="{{ URL::route('create-operador-post') }}" method="post">

			<div class="{{ $errors->has('referencia') ? 'form-group has-error' : 'form-group' }}">
				<label>Referencia</label>
				<input class="form-control" type="text" name="referencia"
				{{ Input::old('referencia') ? 'value="'.e(Input::old('referencia')).'"':'' }}>
				@if($errors->has('referencia'))
				{{ $errors->first('referencia') }}
				@endif
			</div>
			<div class="{{ $errors->has('nombre') ? 'form-group has-error' : 'form-group' }}">
				<label>Nombre</label>
				<input class="form-control" type="text" name="nombre"
				{{ Input::old('nombre') ? 'value="'.e(Input::old('nombre')).'"':'' }}>
				@if($errors->has('nombre'))
				{{ $errors->first('nombre') }}
				@endif
			</div>
			<div class="form-group">
				<label>Apellido</label>
				<input class="form-control" type="text" name="apellido"
				{{ Input::old('apellido') ? 'value="'.e(Input::old('apellido')).'"':'' }}>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Agregar Operador</button>
			</div>
			{{ Form::token() }}
		</form>

	</div>
</div>

@stop