<?php

class HomeController extends BaseController {


	public function home()
	{	
		$servicios = Servicio::all();
		

		$tickets=Ticket::with('cliente','vehiculo','adicional','operador')
    ->where('status', '=', 'Activo')->paginate(15);
		
		return View::make('home', array(
			'link'	    =>	'Inicio',
			'servicios'	=>	$servicios,
			'tickets'	=>  $tickets
			));
	}

}
