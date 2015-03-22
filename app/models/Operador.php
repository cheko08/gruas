<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Operador extends Eloquent {

	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $fillable 	=	['referencia','nombre','apellido'];
	protected $table 		=	'operadores';
	protected $primaryKey 	=	'id';


}