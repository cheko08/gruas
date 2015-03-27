@extends('layout.main')
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Salida de herramientas ticket #{{ $ticket->id }}</h3>
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
		<form class="form" role="form" action="{{ URL::route('entrada-herramientas-post') }}" method="post">
				
				<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
				

			
				
			
				
			<div class="form-group">
				<label>Herramientas</label>
				<textarea name="herramientas" rows="4" class="form-control">{{$ticket->status_comentarios}}
				</textarea>
			</div>
				

			

			
     			


			<div class="form-group">
				<button type="submit" class="btn btn-primary">Recibir herramientas</button>
			</div>
		
		</form>

	</div>
</div>

@stop