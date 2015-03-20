<?php

class Adicional extends Eloquent {

	protected $fillable 	=	['nombre','placas', 'num_economico','status'];
	protected $table 		=	'adicionales';
	protected $primaryKey 	=	'id';


}