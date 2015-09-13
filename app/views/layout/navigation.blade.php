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
			
					


				@if(Auth::user()->role === 'Admin' || Auth::user()->role === 'Almacen')



					<li><a href="{{URL::route('almacen')}}">Almacén</a></li>

				

				@endif			


				@if(Auth::user()->role === 'Admin' || Auth::user()->role === 'Tickets')
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
					<li><a href="{{ URL::route('agregar-cliente') }}">Agregar Clientes</a></li>
						<li><a href="{{ URL::route('ver-clientes') }}">Ver Clientes</a></li>

					</ul>
				</li>	
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tickets<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ URL::route('tickets-cerrados') }}">Tickets Cerrados</a></li>
						<li><a href="{{ URL::route('tickets-cancelados') }}">Tickets Cancelados</a></li>
						<li><a href="{{ URL::route('ticket-reportes') }}">Reportes</a></li>
					</ul>
				</li>	

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Operadores<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ URL::route('crear-operador') }}">Agregar Operador</a></li>
						<li><a href="{{ URL::route('operadores') }}">Ver Operadores</a></li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ URL::route('crear-servicio') }}">Agregar Servicios</a></li>
						<li><a href="{{ URL::route('ver-servicio') }}">Ver Servicios</a></li>
					</ul>
				</li>


				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Vehículos<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ URL::route('crear-vehiculo') }}">Agregar Vehículo</a></li>
						<li><a href="{{ URL::route('ver-vehiculo') }}">Ver Vehículos</a></li>
					</ul>
				</li>
				@endif
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Bienvenido {{ Auth::user()->first_name }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ URL::route('home') }}">Inicio</a></li>

						@if(Auth::user()->role === 'Admin')
						<li class="divider"></li>
						<li><a href="{{ URL::route('create-account') }}">Agregar Usuario</a></li>
						<li><a href="{{ URL::route('cuentas') }}">Ver Cuentas</a></li>
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