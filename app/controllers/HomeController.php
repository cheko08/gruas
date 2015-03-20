<?php

class HomeController extends BaseController {


	public function home()
	{	
		$servicios=DB::table('servicios')
		->select('id','tipo')
		->orderBy('tipo', 'ASC')
		->groupBy('tipo')
		->get();

		$tickets=Ticket::where('status', '=', 'Activo')->get();
		
		return View::make('home', array(
			'link'	    =>	'Inicio',
			'servicios'	=>	$servicios,
			'tickets'	=>  $tickets
			));
	}

}
