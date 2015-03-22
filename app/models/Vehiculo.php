<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Vehiculo extends Eloquent {

	use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

	protected $fillable 	=	['servicio_id','nombre','placas', 'num_economico','status'];
	protected $table 		=	'vehiculos';
	protected $primaryKey 	=	'id';


	public function servicio()
	{
		return $this->belongsTo('Servicio');
	}


}