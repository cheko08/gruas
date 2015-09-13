<?php

class ReportesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function agregarReporte($ticket_id)
	{
		
		return View::make('reportes.agregar-reportes', array(
			'link' =>  'Agregar Reporte',
			'ticket_id'   =>  $ticket_id
			));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeReporte()
	{
		$validator = Validator::make(Input::all(), 
			array(
				'fecha'  => 'required',
				'horas'      => 'required',
				),
			array(
				'required' => 'Este campo es requerido'
				));
		$ticket_id = Input::get('ticket_id');
		if($validator->fails())
		{
			return Redirect::route('agregar-reporte', $ticket_id)
			->withErrors($validator)
			->withInput();
		}

		$folio = Input::get('folio');
		$fecha = Input::get('fecha');
		$hora  = Input::get('horas');
		$user  = Auth::user()->id;

		$reporte = Reporte::create(array(
			'ticket_id'  => $ticket_id,
			'folio'      => $folio,
			'fecha'      => $fecha,
			'horas'      => $hora,
			'created_by' => $user
			));

		if($reporte)
		{
			$ticket = Ticket::find($ticket_id);
			$ticket->horas_reales = $ticket->horas_reales + $hora;
			$ticket->save();
			
			return Redirect::route('agregar-reporte', $ticket_id)
			->with('create','El reporte ha sido agregado!');
		}

		return Redirect::route('agregar-reporte', $ticket_id)
			->with('create-error','Hubo un error al agregar el reporte!');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getVerReportes($ticket_id)
	{
		$reportes = Reporte::where('ticket_id', $ticket_id)->get();
		$ticket   = Ticket::find($ticket_id);

		return View::make('reportes.ver-reportes', array(
			'link'       =>   'Ver Reportes',
			'reportes'   =>   $reportes,
			'ticket'     =>   $ticket
			));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function borrarReporte($id)
	{
		$reporte   = Reporte::find($id);
		$ticket_id = $reporte->ticket_id;

		$ticket = Ticket::find($ticket_id);
		$ticket->horas_reales = $ticket->horas_reales - $reporte->horas;
		$ticket->save();

		Reporte::destroy($id);

		return Redirect::route('ver-reportes', $ticket_id);
	}


}
