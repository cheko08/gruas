<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Servicio extends Eloquent {

	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $fillable 	=	['tipo','nombre','descripcion','status'];
	protected $table 		=	'servicios';
	protected $primaryKey 	=	'id';


}