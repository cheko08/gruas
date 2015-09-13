<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Cliente extends Eloquent {
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];

	protected $fillable 	=	['razon_social','rfc','email','calle','numero_ext','colonia','ciudad','telefono',];
	protected $table 		=	'clientes';
	protected $primaryKey 	=	'id';


}