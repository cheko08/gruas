<?php

class Vehiculo extends Eloquent {

	protected $fillable 	=	['servicio_id','nombre','placas', 'num_economico','status'];
	protected $table 		=	'vehiculos';
	protected $primaryKey 	=	'id';


	public function servicio()
	{
		return $this->belongsTo('Servicio');
	}


}