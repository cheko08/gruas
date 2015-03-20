<?php

class Servicio extends Eloquent {

	protected $fillable 	=	['tipo','nombre','descripcion','status'];
	protected $table 		=	'servicios';
	protected $primaryKey 	=	'id';


}