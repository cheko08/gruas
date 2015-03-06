@extends('layout.main')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Iniciar Sesión</h3>
	</div>
	<div class="panel-body">
		@if(Session::has('signin'))

		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('signin') }}
		</div>

		@endif
		<form class="form" role="form"  action="{{ URL::route('sign-in-account-post') }}" method="post">

			<div class="{{ $errors->has('user') ? 'form-group has-error' : 'form-group' }}">
				<label for="user">Usuario</label>
				<input class="form-control" type="text" name="user"
				{{ Input::old('user') ? 'value="'.e(Input::old('user')).'"':'' }}>
				
				@if($errors->has('user'))
				{{ $errors->first('user') }}
				@endif
			</div>

			<div class="{{ $errors->has('password') ? 'form-group has-error' : 'form-group' }}">
				<label for="Password">Contraseña</label>
				<input class="form-control" type="password" name="password">
				@if($errors->has('password'))
				{{ $errors->first('password') }}
				@endif
				
			</div>
			<div class="checkbox">
				<label for="remember">
				<input type="checkbox" name="remember"> No cerrar mi sesión!
				</label>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Iniciar sesión</button>
			</div>
			{{ Form::token() }}
		</form>
	</div>
</div>

@stop
