<?php

class ExcelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function excelReportes($ticket_id)
	{
		$reportes = Reporte::where('ticket_id', $ticket_id)->get();

		Excel::create('Filename', function($excel) use($reportes) {

			$excel->sheet('Sheetname', function($sheet) use($reportes) {

				$sheet->fromArray($reportes);

			});

		})->export('xls');
	}


	public function excelHistorial()
	{
		$fecha_inicio = Input::get('fecha_inicio');
		$fecha_termino = Input::get('fecha_termino');
		$tipo_servicio = Input::get('tipo_servicio');

		if($tipo_servicio === 'historial')
		{
			$historial = DB::table('tickets')
			->join('clientes', 'tickets.cliente_id', '=', 'clientes.id')
			->select('tickets.id','tickets.folio','clientes.razon_social','tickets.horas_programadas','tickets.horas_reales','tickets.fecha_salida',
				'tickets.fecha_entrada','tickets.fecha_est_entrada','tickets.precio_total','tickets.precio_especial_total','tickets.status')->
			where('tickets.fecha_salida','>=',$fecha_inicio )->
			where('tickets.fecha_salida','<=', $fecha_termino)->get();
		}

		if($tipo_servicio === 'historial_operador')
		{
			$operador = Input::get('operador');
			$historial = DB::table('tickets')
			->join('clientes', 'tickets.cliente_id', '=', 'clientes.id')
			->join('operadores', 'tickets.operador_id', '=', 'operadores.id')
			->select('tickets.id', 'operadores.referencia','operadores.nombre','operadores.apellido','tickets.folio','clientes.razon_social','tickets.horas_programadas','tickets.horas_reales','tickets.fecha_salida',
				'tickets.fecha_entrada','tickets.fecha_est_entrada','tickets.precio_total','tickets.precio_especial_total','tickets.status')->
			where('tickets.fecha_salida','>=',$fecha_inicio )->
			where('tickets.operador_id', '=', $operador)->
			where('tickets.fecha_salida','<=', $fecha_termino)->get();

		}

		if($tipo_servicio === 'historial_maquina')
		{
			$vehiculo = Input::get('vehiculo');
			$historial = DB::table('tickets')
			->join('clientes', 'tickets.cliente_id', '=', 'clientes.id')
			->join('vehiculos', 'tickets.vehiculo_id', '=', 'vehiculos.id')
			->select('tickets.id', 'vehiculos.num_economico', 'vehiculos.nombre','tickets.folio','clientes.razon_social','tickets.horas_programadas','tickets.horas_reales','tickets.fecha_salida',
				'tickets.fecha_entrada','tickets.fecha_est_entrada','tickets.precio_total','tickets.precio_especial_total','tickets.status')->
			where('tickets.fecha_salida','>=',$fecha_inicio )->
			where('tickets.vehiculo_id', '=', $vehiculo)->
			where('tickets.fecha_salida','<=', $fecha_termino)->get();

		}

		

		$historial = json_decode(json_encode($historial), true);

		/*$historial = Ticket::where('created_at','>=',$fecha_inicio)
		->where('created_at','<=', $fecha_termino)
		->get();*/

		Excel::create('Historial', function($excel) use($historial) {

			$excel->sheet('Historial', function($sheet) use($historial) {

				$sheet->fromArray($historial);

			});

		})->export('xls');
	}


	


}
