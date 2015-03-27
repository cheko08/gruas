<?php

class AlmacenController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tickets = Ticket::with('operador')
		->where('almacen', '=', NULL)
		->paginate(15);

		return View::make('almacen.almacen', array(
			'link'    =>   'Almacen',
			'tickets' =>   $tickets
			));
	}


	public function getSalida($ticket_id)
	{
		return View::make('almacen.salida', array(
			'link'      =>  'Salida de Herramientas',
			'ticket_id' =>  $ticket_id
			));
	}


	public function getEntrada($ticket_id)
	{
		$ticket = Ticket::find($ticket_id);

		return View::make('almacen.entrada', array(
			'link'      =>  'Entrada de Herramientas',
			'ticket' =>  $ticket
			));
	}

	public function postSalida()
	{
		$herramientas = Input::get('herramientas');
		$ticket_id    = Input::get('ticket_id');

		$ticket = Ticket::find($ticket_id);
		$ticket->status_comentarios = $herramientas;
		$ticket->save();


		return Redirect::route('almacen')->with('global','Las herramientas se han agregado al ticket.');

	}

	public function postEntrada()
	{
		$herramientas = Input::get('herramientas');
		$ticket_id    = Input::get('ticket_id');

		$ticket = Ticket::find($ticket_id);
		$ticket->status_comentarios = $herramientas;
		$ticket->almacen = 'Recibidas';
		$ticket->save();


		return Redirect::route('almacen')->with('global','Las herramientas se han agregado al ticket.');

	}

}
