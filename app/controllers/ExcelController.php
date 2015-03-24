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


	


}
