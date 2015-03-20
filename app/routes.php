<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::group(array('before' => 'auth'), function(){

	/**
	 * Sign out route
	 */
	Route::get('account/sign-out',array(
		'as'	=>	'sign-out',
		'uses'	=>	'AccountController@getSignOut'
		));

	Route::get('/', array(
		'as'	=>	'home',
		'uses'	=>	'HomeController@home'
		));
	/**
	* Change password view form (GET)
	*/
	Route::get('/account/change-password', array(
		'as'	=>	'change-password',
		'uses'	=>	'AccountController@getChangePassword'
		));

	Route::get('/tickets/{tipo}', array(
		'as'	=>	'create-ticket',
		'uses'	=>	'TicketController@getCreateTicket'
		));
	Route::get('/tickets/imprimir-ticket/{id}',array(
		'as'	=>	'imprimir-ticket',
		'uses'	=>	'TicketController@getImprimirTicket'
		));
	Route::get('/tickets/cerrar-ticket/{id}',array(
		'as'	=>	'cerrar-ticket',
		'uses'	=>	'TicketController@getCerrarTicket'
		));
	Route::get('/operadores/crear-operador', array(
		'as'    =>   'crear-operador',
		'uses'  =>   'OperadorController@createOperador'
		));
	Route::get('/operadores/operadores', array(
		'as'   =>   'operadores',
		'uses' =>   'OperadorController@operadores'
		));
	Route::get('operadores/borrar/{id}', array(
		'as'   =>  'operador-borrar',
		'uses' =>  'OperadorController@destroyOperador'
		));
	Route::get('operadores/actualizar/{id}', array(
		'as'   =>  'operador-actualizar',
		'uses' =>  'OperadorController@editOperador'
		));
	Route::get('servicios/crear-servicio', array(
		'as'   =>  'crear-servicio',
		'uses' =>  'ServiciosController@createServicio'
		));
	Route::get('servicios/ver-servicio', array(
		'as'   =>  'ver-servicio',
		'uses' =>  'ServiciosController@servicios'
		));
	Route::get('servicios/servicio-borrar/{id}', array(
		'as'   =>  'servicio-borrar',
		'uses' =>  'ServiciosController@destroyServicio'
		));
	Route::get('vehiculos/crear-vehiculo', array(
		'as'   =>  'crear-vehiculo',
		'uses' =>  'VehiculoController@createVehiculo'
		));
	Route::get('vehiculos/ver-vehiculo', array(
		'as'   =>  'ver-vehiculo',
		'uses' =>  'VehiculoController@vehiculos'
		));
    Route::get('vehiculos/vehiculo-borrar/{id}', array(
		'as'   =>  'vehiculo-borrar',
		'uses' =>  'VehiculoController@destroyVehiculo'
		));
    Route::get('vehiculos/vehiculo-borrar-adicional/{id}', array(
		'as'   =>  'adicional-borrar',
		'uses' =>  'VehiculoController@destroyAdicional'
		));
	Route::get('vehiculos/vehiculo-editar/{id}', array(
		'as'   =>  'vehiculo-editar',
		'uses' =>  'VehiculoController@editVehiculo'
		));
	Route::get('vehiculos/vehiculo-editar-adicional/{id}', array(
		'as'   =>  'adicional-editar',
		'uses' =>  'VehiculoController@editAdicional'
		));
	Route::get('reportes/agregar-reporte/{ticket_id}', array(
		'as'   =>  'agregar-reporte',
		'uses' =>  'ReportesController@agregarReporte'
		));
	Route::get('tickets/ticket-editar/{ticket_id}', array(
		'as'   =>  'ticket-editar',
		'uses' =>  'TicketController@getEditarTicket'
		));
	Route::get('tickets', array(
		'as'   =>  'tickets',
		'uses' =>  'TicketController@getTicketCerrados'
		));



		Route::group(array('before' => 'csrf'), function(){

	/**
 		* Change password process form (POST)
 		*/
 		Route::post('/account/change-password', array(
 			'as'	=>	'change-password-post',
 			'uses'	=>	'AccountController@postChangePassword'
 			));
 		Route::post('/tickets/crear-ticket',array(
 			'as'	=>	'post-create-ticket',
 			'uses'	=>	'TicketController@postCreateTicket'
 			));
 		Route::post('/tickets/cerrar-ticket',array(
 			'as'	=>	'post-cerrar-ticket',
 			'uses'	=>	'TicketController@postCerrarTicket'
 			));
 		Route::post('/operadores/crear-operador', array(
 			'as'    =>  'create-operador-post',
 			'uses'  =>  'OperadorController@storeOperador'
 			));
 		Route::post('/operadores/editar-operador', array(
 			'as'    =>  'editar-operador-post',
 			'uses'  =>  'OperadorController@updateOperador'
 			));
 		Route::post('/servicios/crear-servicio', array(
 			'as'    =>  'create-servicio-post',
 			'uses'  =>  'ServiciosController@storeServicio'
 			));
 		Route::post('/vehiculos/crear-vehiculo', array(
 			'as'    =>  'create-vehiculo-post',
 			'uses'  =>  'VehiculoController@storeVehiculo'
 			));
 		Route::post('/vehiculos/editar-vehiculo', array(
 			'as'    =>  'edit-vehiculo-post',
 			'uses'  =>  'VehiculoController@updateVehiculo'
 			));
 		Route::post('/reportes/agregar-reporte', array(
 			'as'    =>  'agregar-reporte-post',
 			'uses'  =>  'ReportesController@storeReporte'
 			));
 		Route::post('/tickets/editar-ticket',array(
 			'as'	=>	'post-editar-ticket',
 			'uses'	=>	'TicketController@postEditarTicket'
 			));
 		Route::post('/tickets/cambiar-precio',array(
 			'as'	=>	'precio-especial',
 			'uses'	=>	'TicketController@postPrecioEspecial'
 			));
 	

 			 	}); // end  Auth and CSRF group	

 	/**
	 * Group for admin
	 */
 	Route::group(array('before' => 'admin'),function(){
 				/**
		 		* Create account view form (GET)
		 		*/
		 		Route::get('/account/create', array(
		 			'as'	=>	'create-account',
		 			'uses'	=>	'AccountController@getCreate'
		 			));
		 		Route::get('/account/cuentas', array(
					'as'   =>   'cuentas',
					'uses' =>   'AccountController@cuentas'
					));
		 		Route::get('/account/cuentas-borrar/{id}', array(
					'as'   =>   'cuenta-borrar',
					'uses' =>   'AccountController@deleteCuenta'
					));
		 		

			/**
			 * Group for admin and CSRF
	 		*/
			Route::group(array('before' => 'csrf'), function(){

				/**
		 		* Create account (POST)
		 		*/
		 		Route::post('/account/create', array(
		 			'as'	=>	'create-account-post',
		 			'uses'	=>	'AccountController@postCreate'
		 			));


	 	}); // end  admin and CSRF group	

	});//end for admin group 		

 	}); //end auth group

/**
 * unauthenticated group
 */
Route::group(array('before' => 'guest'), function(){

	Route::get('/account/sign-in', array(
		'as'	=>	'sign-in-account',
		'uses'	=>	'AccountController@getSignIn'
		));

	/**
 	* CSRF protection group
 	*/
 	Route::group(array('before' => 'csrf'), function(){

		/**
 		* Sign In account (POST)
 		*/
 		Route::post('/account/sign-in', array(
 			'as'	=>	'sign-in-account-post',
 			'uses'	=>	'AccountController@postSignIn'
 			));


 	}); // end CSRF group for unauthenticated


});// end  group for unauthenticated