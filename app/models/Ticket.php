<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Ticket extends Eloquent {

	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];
	protected $fillable  =  [
	'folio',
	'operador_id',
	'servicio_id', 
	'vehiculo_id', 
	'vehiculo_adicional_id', 
	'tiempo_servicio', 
	'horas_programadas',
	'horas_reales',
	'fecha_salida',
	'fecha_est_entrada',
	'hora_est_entrada',
	'fecha_entrada',
	'hora_entrada',
	'hora_salida',
	'precio_hora',
	'precio_total',
	'precio_especial_hora',
	'precio_especial_total',
	'cliente_id',
	'status',
	'descripcion',
	'status_lugar',
	'status_comentario',
	'herramientas',
	'created_by',
	'updated_by'
	];

	protected $table 		=	'tickets';
	protected $primaryKey 	=	'id';

	public function servicio()
	{
		return $this->belongsTo('Servicio')->withTrashed();;
	}

	public function cliente()
	{
		return $this->belongsTo('Cliente');
	}

	public function operador()
	{
		return $this->belongsTo('Operador')->withTrashed();
	}

	public function vehiculo()
	{	
		
		return $this->belongsTo('Vehiculo')->withTrashed();
	}

	public function adicional()
	{
		return $this->belongsTo('Adicional','vehiculo_adicional_id')->withTrashed();
	}

	public function user()
	{
		return $this->belongsTo('User','created_by');
	}

}