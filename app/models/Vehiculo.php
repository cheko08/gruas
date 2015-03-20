<?php

class Vehiculo extends Eloquent {

	protected $fillable 	=	['tipo','nombre','placas', 'num_economico','status'];
	protected $table 		=	'vehiculos';
	protected $primaryKey 	=	'id';


}