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