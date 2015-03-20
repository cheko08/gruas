<?php

class Cliente extends Eloquent {

	protected $fillable 	=	['nombre','apellidos','empresa','telefono','direccion'];
	protected $table 		=	'clientes';
	protected $primaryKey 	=	'id';


}