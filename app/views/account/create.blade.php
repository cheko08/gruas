@extends('layout.main')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Agrega una cuenta</h3>
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
		<form class="form" role="form" action="{{ URL::route('create-account-post') }}" method="post">

			<div class="{{ $errors->has('user') ? 'form-group has-error' : 'form-group' }}">
				<label>Usuario</label>
				<input class="form-control" type="text" name="user"
				{{ Input::old('user') ? 'value="'.e(Input::old('user')).'"':'' }}>
				@if($errors->has('user'))
				{{ $errors->first('user') }}
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
			<div class="{{ $errors->has('apellido') ? 'form-group has-error' : 'form-group' }}">
				<label>Apellido</label>
				<input class="form-control" type="text" name="apellido"
				{{ Input::old('apellido') ? 'value="'.e(Input::old('apellido')).'"':'' }}>
				@if($errors->has('apellido'))
				{{ $errors->first('apellido') }}
				@endif
			</div>
			<div class="{{ $errors->has('password') ? 'form-group has-error' : 'form-group' }}">
				<label>Contraseña</label>
				<input class="form-control" type="password" name="password">
				@if($errors->has('password'))
				{{ $errors->first('password') }}
				@endif
			</div>
			<div class="form-group">
				<label>Role del usuario</label>
				<select name="role" class="form-control">
					<option value="Admin">Administrador</option>
					<option value="Tickets">Tickets</option>
					<option value="Almacen">Almacén</option>
					<option value="Entrada">Entrada</option>
				</select>

			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Crear cuenta</button>
			</div>
			{{ Form::token() }}
		</form>

	</div>
</div>
@stop