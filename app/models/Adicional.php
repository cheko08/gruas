<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;


class Adicional extends Eloquent {

	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $fillable 	=	['nombre','placas', 'num_economico','status'];
	protected $table 		=	'adicionales';
	protected $primaryKey 	=	'id';


}