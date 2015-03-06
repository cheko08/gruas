<?php

class Grua extends Eloquent {

	protected $fillable 	=	['tipo','nombre','descripcion','status','placas'];
	protected $table 		=	'gruas';
	protected $primaryKey 	=	'id';


}