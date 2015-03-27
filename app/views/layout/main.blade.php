<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	{{ HTML::style('assets/css/bootstrap.min.css') }}
	{{ HTML::style('assets/css/styles.css') }}
	{{ HTML::style('assets/css/print.css', array('media' => 'print')) }}
	 <link rel="shortcut icon" href="{{ asset('images/favicon.ico')  }}" />
	<title>{{ $link }}</title>
</head>
<body>
	
	@if(Session::has('global'))
		<div class="alert alert-success alert-dismissable float">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('global') }}
		</div>
		@endif

		@if(Session::has('global-error'))
		<div class="alert alert-danger alert-dismissable float">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('global-error') }}
		</div>
		@endif
	@include('layout.navigation')
	@yield('content')

	{{ HTML::script('assets/js/jquery-1.11.1.min.js') }}
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	{{ HTML::script('assets/js/functions.js') }}

</body>
</html>