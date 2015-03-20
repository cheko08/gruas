<?php

class Operador extends Eloquent {

	protected $fillable 	=	['referencia','nombre','apellido'];
	protected $table 		=	'operadores';
	protected $primaryKey 	=	'id';


}