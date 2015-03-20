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

		
		$fecha = Input::get('fecha');
		$hora = Input::get('horas');

		$reporte = Reporte::create(array(
			'ticket_id' => $ticket_id,
			'fecha'     => $fecha,
			'horas'      => $hora
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
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
