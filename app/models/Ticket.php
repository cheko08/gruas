<?php

class Ticket extends Eloquent {

	protected $fillable 	=	['folio','operador_id','grua_id','horas_programadas','horas_reales','hora_entrada','hora_salida','costo','cliente_id','telefono_contacto','status','descripcion','status_lugar','status_comentario','herramientas','created_by','updated_by'];
	protected $table 		=	'tickets';
	protected $primaryKey 	=	'id';

	public function gruas()
	{
			return $this->belongsToMany('Grua');
	}

	public function clientes()
	{
			return $this->belongsToMany('Cliente');
	}

	public function operadores()
	{
			return $this->belongsToMany('Operador');
	}

}