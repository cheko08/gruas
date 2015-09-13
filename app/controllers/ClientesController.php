<?php

class ClientesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function verClientes()
	{

		$clientes = Cliente::paginate(50);

			if(Input::has('search'))
		{
			$razon_social = Input::get('razon_social');
			$clientes =  Cliente::where('razon_social', 'LIKE', '%'.$razon_social.'%')->paginate(50);
		}

		return View::make('clientes.ver-clientes', array(
			'link' => 'Ver Clientes',
			'clientes' => $clientes
			));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createCliente()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		$cliente = Cliente::find($id);

		return View::make('clientes.editar-cliente', array(
			'link'                =>   'Editar Cliente',
			'cliente' =>   $cliente,
			));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id = Input::get('cliente');

		
	     $razon                =    Input::get('razon');
         $rfc                  =    Input::get('rfc');
         $email                =    Input::get('email');
         $telefono             =    Input::get('telefono');
         $calle                =    Input::get('calle');
         $num_ext              =    Input::get('num_ext');
         $colonia              =    Input::get('colonia');
         $ciudad               =    Input::get('ciudad');

         $cliente = Cliente::find($id);

         $cliente->razon_social = $razon;
         $cliente->rfc          = $rfc;
         $cliente->email        = $email;
         $cliente->telefono     = $telefono;
         $cliente->calle        = $calle;
         $cliente->numero_ext   = $num_ext;
         $cliente->colonia      = $colonia;
         $cliente->ciudad       = $ciudad;
         $cliente->save();

         return Redirect::route('ver-clientes')
                ->with('global','El Cliente ha sido actualizado!');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tickets = Ticket::where('cliente_id',$id)->where('status','Activo')->get();

		if(count($tickets) > 0 )
		{
			return Redirect::route('ver-clientes')
			->with('global-error','El Cliente no puede ser borrado. Hay tickets activos con este cliente asignado.');
		}
		
		$cliente = Cliente::find($id);
		$cliente->delete();
		return Redirect::route('ver-clientes');
	}


}
