<?php

class Reporte extends Eloquent {

	protected $fillable 	=	['fecha','horas','ticket_id'];
	protected $table 		=	'reportes';
	protected $primaryKey 	=	'id';


}