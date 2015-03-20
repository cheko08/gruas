<?php

class VehiculoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function vehiculos()
	{
		$vehiculos = Vehiculo::all();
		return View::make('vehiculos.vehiculos', array(
			'link' => 'Ver Vehiculos',
			'vehiculos' => $vehiculos
			));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createVehiculo()
	{

		$servicios = Servicio::all();
		return View::make('vehiculos.create', array(
			'link' => 'Agregar Vehiculo',
			'servicios' => $servicios
			));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeVehiculo()
	{
		$validator = Validator::make(Input::all(), 
			array(
				'servicio'  => 'required',
				'nombre'      => 'required',
				),
			array(
				'required' => 'Este campo es requerido'
				));

		if($validator->fails())
		{
			return Redirect::route('crear-vehiculo')
			->withErrors($validator)
			->withInput();
		}

		$vehiculo = Vehiculo::create(array(

			'tipo'    =>    Input::get('servicio'),
			'nombre'  =>    Input::get('nombre'),
			'num_economico'  => Input::get('num-economico'),
			'placas'  =>    Input::get('placas'),
			)); 

		if($vehiculo)
		{
			return Redirect::route('crear-vehiculo')
			->with('create','El vehículo ha sido agregado!');
		}
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
	public function editVehiculo($id)
	{
		$servicios = Servicio::all();
		$vehiculo = Vehiculo::find($id);
		return View::make('vehiculos.edit', array(
			'link' => 'Editar Vehiculo',
			'vehiculo' => $vehiculo,
			'servicios' => $servicios
			));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateVehiculo()
	{
		$validator = Validator::make(Input::all(), 
			array(
				'servicio'  => 'required',
				'nombre'      => 'required',
				),
			array(
				'required' => 'Este campo es requerido'
				));
		$id = Input::get('id');
		if($validator->fails())
		{
			$servicios = Servicio::all();
			
			return Redirect::route('vehiculo-editar', array(
			'id' => $id,))
			->withErrors($validator)
			->withInput();
		}

		

		$vehiculo = Vehiculo::find($id);
		$vehiculo->nombre     = Input::get('nombre');
		$vehiculo->tipo   = Input::get('servicio');
		$vehiculo->placas = Input::get('placas');
		$vehiculo->num_economico = Input::get('num-economico');
		$vehiculo->save();

		return Redirect::route('ver-vehiculo')
		->with('global','El vehículo ha sido actualizado!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyVehiculo($id)
	{
		Vehiculo::destroy($id);
		return Redirect::route('ver-vehiculo');
	}


}
