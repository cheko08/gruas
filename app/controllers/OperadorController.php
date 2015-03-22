<?php

class OperadorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function operadores()
	{
		$operadores = Operador::all();
		return View::make('operadores.operadores', array(
			'link'       =>  'Operadores',
			'operadores' =>  $operadores
			));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createOperador()
	{
		return View::make('operadores.crear-operador', array(
			'link'   =>  'Agregar Operador'
			));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function storeOperador()
	{
		$validator = Validator::make(Input::all(), 
    		array(
    			'referencia'  => 'required|unique:operadores,referencia',
    			'nombre'      => 'required',
    			'apellido'    => 'required' 
    			),
    		array(
    			'required' => 'Este campo es requerido',
    			'unique'   => 'Ya existe otro operador con esta referencia'
    			));

    	if($validator->fails())
    	{
    		return Redirect::route('crear-operador')
    		->withErrors($validator)
    		->withInput();
    	} 
		$referencia   =  Input::get('referencia');
		$nombre       =  Input::get('nombre');
		$apellido     =  Input::get('apellido');

		$operador = Operador::create(array(
			'referencia'  => $referencia,
			'nombre'     => $nombre,
			'apellido'    => $apellido
			));

		if($operador){
                  
                return Redirect::route('crear-operador')
                ->with('create','El operador ha sido agregado!');

            }

            return Redirect::route('crear-operador')
            ->with('create-error','Hubo un problema al crear el operador.');
        
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editOperador($id)
	{	
		$operador            = DB::table('operadores')->where('id', $id)->pluck('id');
		$operador_referencia = DB::table('operadores')->where('id', $id)->pluck('referencia');
		$operador_nombre     = DB::table('operadores')->where('id', $id)->pluck('nombre');
		$operador_apellido   = DB::table('operadores')->where('id', $id)->pluck('apellido');
		return View::make('operadores.editar-operador', array(
			'link'                =>   'Editar Operador',
			'operadorreferencia' =>   $operador_referencia,
			'operadornombre' =>   $operador_nombre,
			'operadorapellido' =>   $operador_apellido,
			'operador' =>   $operador,
			));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updateOperador()
	{
		$validator = Validator::make(Input::all(), 
    		array(
    			'referencia'  => 'required',
    			'nombre'      => 'required',
    			'apellido'    => 'required' 
    			),
    		array(
    			'required' => 'Este campo es requerido',
    			));

    	if($validator->fails())
    	{
    		return Redirect::route('operador-actualizar')
    		->withErrors($validator)
    		->withInput();
    	} 

    	$id = Input::get('operador');

		$operador = Operador::find($id);
		$operador->nombre     = Input::get('nombre');
		$operador->apellido   = Input::get('apellido');
		$operador->referencia = Input::get('referencia');
		$operador->save();

		return Redirect::route('operadores')
                ->with('global','El operador ha sido actualizado!');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyOperador($id)
	{
		$tickets = Ticket::where('operador_id',$id)->get();

		if(count($tickets) > 0 )
		{
			return Redirect::route('operadores')
			->with('global-error','El Operador no puede ser borrado. Hay tickets con este operador asignado.');
		}
		
		Operador::destroy($id);
		return Redirect::route('operadores');
	}


}
