<?php

class ServiciosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function servicios()
	{
		$servicios = Servicio::all();
		return View::make('servicios.servicios', array(
			'link' => 'Ver Servicios',
			'servicios' => $servicios
			));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createServicio()
	{
		return View::make('servicios.create', array(
			'link' => 'Agregar Servicio'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeServicio()
	{
		$validator = Validator::make(Input::all(), 
    		array(
    			'tipo'  => 'required',
    			'descripcion'      => 'required',
    			),
    		array(
    			'required' => 'Este campo es requerido'
    			));

    	if($validator->fails())
    	{
    		return Redirect::route('crear-servicio')
    		->withErrors($validator)
    		->withInput();
    	}

    	$servicio = Servicio::create(array(

    		'tipo'         =>    Input::get('tipo'),
    		'descripcion'  =>    Input::get('descripcion')
    		)); 

    	if($servicio)
    	{
    		return Redirect::route('crear-servicio')
                ->with('create','El servicio ha sido agregado!');
    	}
	}


	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyServicio($id)
	{

		$tickets = Ticket::where('servicio_id',$id)->get();

		if(count($tickets) > 0 )
		{
			return Redirect::route('ver-servicio')
			->with('global-error','El servicio no puede ser borrado. Hay tickets con este servicio asignado.');
		}

		Servicio::destroy($id);
		return Redirect::route('ver-servicio');
	}


}
