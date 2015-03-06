@extends('layout.main')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Cambia tu Contraseña</h3>
	</div>
	<div class="panel-body">
		@if(Session::has('change-password'))

		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('change-password') }}
		</div>

		@endif
		<form class="form" role="form"  action="{{ URL::route('change-password-post') }}" method="post">


			<div class="{{ $errors->has('old-password') ? 'form-group has-error' : 'form-group' }}">
				<label for="old-password">Contraseña Actual</label>
				<input class="form-control" type="password" name="old-password">
				@if($errors->has('old-password'))
				{{ $errors->first('old-password') }}
				@endif
			</div>

			<div class="{{ $errors->has('password') ? 'form-group has-error' : 'form-group' }}">
				<label for="password">Nueva Contraseña</label>
				<input class="form-control" type="password" name="password">
				@if($errors->has('password'))
				{{ $errors->first('password') }}
				@endif
			</div>

			<div class="{{ $errors->has('repeat-password') ? 'form-group has-error' : 'form-group' }}">
				<label for="repeat-password">Confirma tu Contraseña</label>
				<input class="form-control" type="password" name="repeat-password">
				@if($errors->has('repeat-password'))
				{{ $errors->first('repeat-password') }}
				@endif
			</div>
	
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
			</div>
			{{ Form::token() }}
		</form>
	</div>
</div>
@stop