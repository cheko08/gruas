<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ URL::route('home') }}"><img src="{{ asset('images/logo.png')  }}" alt="Gruas ordonez" class="img-responsive"></a>
		</div>
		<!-- end navbar-header -->
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido {{ Auth::user()->first_name }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ URL::route('home') }}">Inicio</a></li>
						<li class="divider"></li>
						@if(Auth::user()->role === 'Admin')
						<li><a href="{{ URL::route('create-account') }}">Agregar Usuario</a></li>
						<li><a href="">Ver Cuentas</a></li>
						<li class="divider"></li>
						<li><a href="">Agregar Operador</a></li>
						<li><a href="">Ver Operadorares</a></li>
						<li><a href="">Agregar Grúa</a></li>
						<li><a href="">Ver Grúas</a></li>
						<li><a href="">Reportes</a></li>
						@endif

						@if(Auth::user()->role === 'Tickets')
						<li><a href="">Agregar Operador</a></li>
						<li><a href="">Ver Operadorares</a></li>
						<li><a href="">Agregar Grúa</a></li>
						<li><a href="">Ver Grúas</a></li>
						@endif
	
						<li class="divider"></li>
						<li><a href="{{ URL::route('change-password') }}">Cambiar Contraseña</a></li>
						<li><a href="{{ URL::route('sign-out') }}">Cerrar Sesión</a></li>
					</ul>
				</li>
				@else 
				<li><a href="{{ URL::route('home') }}">Inicio</a></li>

				@endif
			</ul>
		</div><!-- /.navbar-collapse -->
	</div> 
	<!-- end container fluid -->
</nav>
<!-- end navbar -->