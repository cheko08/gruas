<?php

class TicketController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getCreateTicket($tipo)
	{	

		$gruas = Grua::where('tipo', '=', $tipo)->get();
		$clientes	=	Cliente::all();

		return View::make('tickets.crear-ticket',array(
			'link'	=>	'Ticket de Salida',
			'tipo'	=>	$tipo,
			'gruas'	=>	$gruas,
			'clientes'	=>	$clientes

			));
	}

	public function postCreateTicket()
	{
			$tipo				=	Input::get('tipo');
			$grua 				=	Input::get('grua');
			$cliente 			=	Input::get('cliente');
			$operador			=	Input::get('operador');
			$horas_estimadas	=	Input::get('horas_estimadas');
			$status_lugar		=	Input::get('status_lugar');
			$comments			=	Input::get('comments');

			$user= Auth::user()->username;
			$hora_salida = date("Y-m-d H:i:s");
			$status = "Activo";

			$ticket = Ticket::create(array(
				'grua_id'			=>	$grua,
				'operador_id'		=> 	$operador,
				'horas_programadas'	=> 	$horas_estimadas,
				'cliente_id'		=>	$cliente,
				'status_lugar'		=>	$status_lugar,
				'descripcion'		=>	$comments,
				'hora_salida'		=>	$hora_salida,
				'status'			=>	$status,
				'created_by'		=>	$user,
				'updated_by'		=>	$user
				));

			if($ticket)
			{

				$ticket->gruas()->attach($grua);
				$ticket->clientes()->attach($cliente);
				$ticket->operadores()->attach($operador);
		
				$id = $ticket->id;
				 return Redirect::route('imprimir-ticket',$ticket->id)
				 ->with("create","El ticket folio ".$id." ha sido creado");
			}
	}

	public function getImprimirTicket($id)
	{
		$grua_id	= DB::table('tickets')->where('id', $id)->pluck('grua_id');
		$tipo_grua	= DB::table('gruas')->where('id', $grua_id)->pluck('tipo');
		$grua 		= DB::table('gruas')->where('id', $grua_id)->pluck('nombre');
		$cliente_id	= DB::table('tickets')->where('id', $id)->pluck('cliente_id');
		$cliente 	= Cliente::find($cliente_id);
		$ticket = Ticket::find($id);
		

		return View::make('tickets.imprimir-salida',array(
				 	'link'		=>	'Imprimir ticket de salida',
				 	'folio'		=>	$id,
				 	'tipo_grua'	=>	$tipo_grua,
				 	'grua'		=>	$grua,
				 	'cliente'	=>	$cliente,
				 	'ticket'	=>	$ticket

				 	));
	}

}
