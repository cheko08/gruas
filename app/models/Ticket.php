<?php

class Ticket extends Eloquent {

	protected $fillable 	=	['folio','operador_id','servicio_id', 'vehiculo', 'vehiculo_adicional', 'tiempo_servicio', 'horas_programadas','horas_reales',  'fecha_salida', 'fecha_est_entrada', 'hora_est_entrada', 'fecha_entrada', 'hora_entrada','hora_salida','costo','costo_total','precio_especial','precio_especial_total','cliente_id','telefono_contacto','status','descripcion','status_lugar','status_comentario','herramientas','created_by','updated_by'];
	protected $table 		=	'tickets';
	protected $primaryKey 	=	'id';

	public function servicios()
	{
			return $this->belongsToMany('Servicio');
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