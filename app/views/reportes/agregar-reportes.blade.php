@extends('layout.main')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Agrega un Reporte al Ticket #{{ $ticket_id }}</h3>
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
		<form class="form" role="form" action="{{ URL::route('agregar-reporte-post') }}" method="post">
				
				<input type="hidden" name="ticket_id" value="{{ $ticket_id }}">
				

			
				
			<div class="row">
			<div class="col-xs-4">
				<div class="{{ $errors->has('folio') ? 'form-group has-error' : 'form-group' }}">
				<label>Folio</label>
				<input class="form-control" type="text" name="folio"
				{{ Input::old('folio') ? 'value="'.e(Input::old('folio')).'"':'' }}>
				@if($errors->has('folio'))
				{{ $errors->first('folio') }}
				@endif
			</div>
			</div>
				<div class="col-xs-4">
					<div class="{{ $errors->has('fecha') ? 'form-group has-error' : 'form-group' }}">
				<label>Fecha</label>
				<input class="form-control" type="date" name="fecha"
				{{ Input::old('fecha') ? 'value="'.e(Input::old('fecha')).'"':'' }}>
				@if($errors->has('fecha'))
				{{ $errors->first('fecha') }}
				@endif
			</div>
				</div>
				<div class="col-xs-4">
				<div class="{{ $errors->has('horas') ? 'form-group has-error' : 'form-group' }}">
				<label>Horas</label>
				<input class="form-control" type="number" name="horas"
				{{ Input::old('horas') ? 'value="'.e(Input::old('horas')).'"':'' }}>
				@if($errors->has('horas'))
				{{ $errors->first('horas') }}
				@endif
			</div>
				</div>
			</div>

			

			
     			


			<div class="form-group">
				<button type="submit" class="btn btn-primary">Agregar Reporte</button>
			</div>
			{{ Form::token() }}
		</form>

	</div>
</div>

@stop