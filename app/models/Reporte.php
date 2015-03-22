<?php

class Reporte extends Eloquent {

	protected $fillable 	=	['fecha','horas','ticket_id','created_by'];
	protected $table 		=	'reportes';
	protected $primaryKey 	=	'id';


	public function user()
	{
		return $this->belongsTo('User','created_by');
	}

}