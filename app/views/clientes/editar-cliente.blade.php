@extends('layout.main')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Editar Cliente</h3>
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
		<form class="form" role="form" action="{{ URL::route('editar-cliente-post') }}" method="post">
			<div class="form-group">
				
				<div class="row">
					<div class="col-xs-6">
					<label>Razón Social</label>
					
						<input type="text"  class="form-control" name="razon" value="{{$cliente->razon_social}}">
					</div>
					<div class="col-xs-6">
					<label>RFC</label>
						<input type="text" class="form-control" name="rfc" value="{{$cliente->rfc}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6">
					<label>Email</label>
						<input type="text"  class="form-control" name="email" value="{{$cliente->email}}">
					</div>
					<div class="col-xs-6">
					<label>Teléfono</label>
						<input type="text"  class="form-control" name="telefono" value="{{$cliente->telefono}}">
					</div>

				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-3">
					<label>Calle</label>
						<input type="text"  class="form-control" name="calle" value="{{$cliente->calle}}">
					</div>
					<div class="col-xs-3">
					<label>Num. Ext.</label>
						<input type="text"  class="form-control" name="num_ext" value="{{$cliente->numero_ext}}">
					</div>
					<div class="col-xs-3">
					<label>Colonia</label>
						<input type="text" class="form-control" name="colonia" value="{{$cliente->colonia}}">
					</div>
					<div class="col-xs-3">
					<label>Ciudad</label>
						<input type="text"  class="form-control" name="ciudad" value="{{$cliente->ciudad}}">
					</div>

				</div>
			</div>

			<input type="hidden" name="cliente" value="{{ $cliente->id }}">
			
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Editar Cliente</button>
			</div>

			{{ Form::token() }}
		</form>

	</div>
</div>

@stop