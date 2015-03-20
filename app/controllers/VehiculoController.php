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
		$adicionales = Adicional::all();

		return View::make('vehiculos.vehiculos', array(
			'link' => 'Ver Vehiculos',
			'vehiculos' => $vehiculos,
			'adicionales' => $adicionales
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

		if(Input::get('servicio')=='Adicional')
		{
			$vehiculo = Adicional::create(array(
				'nombre'         =>    Input::get('nombre'),
				'num_economico'  =>    Input::get('num-economico'),
				'placas'         =>    Input::get('placas'),
				)); 

			if($vehiculo)
			{
				return Redirect::route('crear-vehiculo')
				->with('create','El vehículo ha sido agregado!');
			}
		}

		$vehiculo = Vehiculo::create(array(

			'servicio_id'    =>    Input::get('servicio'),
			'nombre'         =>    Input::get('nombre'),
			'num_economico'  =>    Input::get('num-economico'),
			'placas'         =>    Input::get('placas'),
			)); 

		if($vehiculo)
		{
			return Redirect::route('crear-vehiculo')
			->with('create','El vehículo ha sido agregado!');
		}
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
		$vehiculo  = Vehiculo::find($id);

		return View::make('vehiculos.edit', array(
			'link'      => 'Editar Vehiculo',
			'vehiculo'  => $vehiculo,
			'servicios' => $servicios
			));
	}


	public function editAdicional($id)
	{
		$servicios = Servicio::all();
		$vehiculo  = Adicional::find($id);

		return View::make('vehiculos.edit-adicional', array(
			'link'      => 'Editar Vehiculo',
			'vehiculo'  => $vehiculo,
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

		if(Input::get('servicio')=='Adicional')
		{
			$vehiculo = Adicional::find($id);
		    $vehiculo->nombre        = Input::get('nombre');
		    $vehiculo->placas        = Input::get('placas');
		    $vehiculo->num_economico = Input::get('num-economico');
		    $vehiculo->save();

		return Redirect::route('ver-vehiculo')
		->with('global','El vehículo ha sido actualizado!');
		}

		$vehiculo = Vehiculo::find($id);
		$vehiculo->nombre        = Input::get('nombre');
		$vehiculo->servicio_id   = Input::get('servicio');
		$vehiculo->placas        = Input::get('placas');
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
		$tickets = Ticket::where('vehiculo_id',$id)->get();

		if(count($tickets) > 0 )
		{
			return Redirect::route('ver-vehiculo')
			->with('global-error','El Vehículo no puede ser borrado. Hay tickets con este vehículo asignado.');
		}

		Vehiculo::destroy($id);
		return Redirect::route('ver-vehiculo');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyAdicional($id)
	{
		$tickets = Ticket::where('vehiculo_adicional_id',$id)->get();

		if(count($tickets) > 0 )
		{
			return Redirect::route('ver-vehiculo')
			->with('global-error','El Vehículo no puede ser borrado. Hay tickets con este vehículo asignado.');
		}

		Adicional::destroy($id);
		return Redirect::route('ver-vehiculo');
	}


}
