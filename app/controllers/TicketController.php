<?php

class TicketController extends BaseController
{
/**
 * [getCreateTicket Muestra la forma para crear tickets]
 * @param  [texto] $tipo [tipo de servicio]
 * @return [vista]       [crear-ticket]
 */
public function getCreateTicket($tipo)
{
    $vehiculos   =    Vehiculo::where('tipo', '=', $tipo)->get();
    $vehiculos_a   =    Vehiculo::where('tipo', '=', 'Adicional')->get();
    $clientes   =     Cliente::all();
    return View::make('tickets.crear-ticket', array(
        'link'        =>    'Ticket de Salida',
        'tipo'        =>    $tipo,
        'vehiculos'   =>    $vehiculos,
        'vehiculos_a'  =>   $vehiculos_a,
        'clientes'    =>    $clientes
        ));
}


public function getTicketCerrados()
{
    $tickets=Ticket::where('status', '=', 'Cerrado')->get();
        return View::make('tickets.cerrados', array(
            'link'      =>  'Tickets Cerrados',
            'tickets'   =>  $tickets
            ));
}

public function getEditarTicket($id)
{
    $ticket = Ticket::find($id);
    $op_id = DB::table('operadores')->where('id', $ticket->operador_id)->pluck('id');
    $op = DB::table('operadores')->where('id', $ticket->operador_id)->pluck('nombre');
    $op_a = DB::table('operadores')->where('id', $ticket->operador_id)->pluck('apellido');
    $vehiculos   =    Vehiculo::where('id', '=', $ticket->servicio_id)->get();
    $vehiculos_a   =  Vehiculo::where('tipo', '=', 'Adicional')->get();
    $operadores = Operador::all();
    return View::make('tickets.editar', array(
        'link' => 'Editar Ticket',
        'ticket' => $ticket,
        'vehiculos'   =>    $vehiculos,
        'vehiculos_a'  =>   $vehiculos_a,
        'operadores' => $operadores,
        'op_id' => $op_id,
        'op' => $op,
        'op_a' => $op_a
        ));
}

/**
 * [postCreateTicket guarda el ticket en la base de datos]
 * @return [route] [imprimir-ticket]
 */
public function postCreateTicket()
{	
    	//Recibe las variables de la forma
    $tipo                 =    Input::get('tipo');
    $cliente              =    Input::get('cliente');
    $vehiculo             =    Input::get('vehiculo');
    $vehiculo_adicional   =    Input::get('vehiculo_adicional');
    $nombre               =    Input::get('nombre');
    $apellido             =    Input::get('apellido');
    $empresa              =    Input::get('empresa');
    $telefono             =    Input::get('telefono');
    $direccion            =    Input::get('direccion');
    $operador             =    Input::get('operador');
    $fecha_salida         =    Input::get('fecha');
    $hora_salida          =    Input::get('hora');
    $fecha_est_entrada    =    Input::get('fecha_est_entrada');
    $hora_est_entrada     =    Input::get('hora_est_entrada');
    $horas_estimadas      =    Input::get('horas_estimadas');
    $status_lugar         =    Input::get('status_lugar');
    $tiempo_servicio      =    Input::get('tiempo_servicio');
    $comments             =    Input::get('comments');


   /* $vehiculo_disponible = DB::select('select * from tickets where vehiculo = "'.$vehiculo.'" and fecha_est_entrada > "'.$fecha_salida.'" and fecha_salida < "'.$fecha_salida.'"');

    if(count($vehiculo_disponible) > 0)
    {

        return Redirect::route('create-ticket', array(
            'tipo' => $tipo
            ))
        ->with("create-error", "Este vehículo ya está reservado1");

    }


    $vehiculo_disponible = DB::select('select * from tickets where vehiculo = "'.$vehiculo.'" and fecha_salida = "'.$fecha_salida.'" or fecha_est_entrada = "'.$fecha_est_entrada.'"
     and hora_salida < "'.$hora_est_entrada.'"');

    if(count($vehiculo_disponible) > 0)
    {


        return Redirect::route('create-ticket', array(
            'tipo' => $tipo
            ))
        ->with("create-error", "Este vehículo ya está reservado2");
    }
*/



    
    $servicio = DB::table('servicios')->where('tipo', $tipo)->pluck('id');

    //Asigna a $user el nombre de usuario
    $user = Auth::user()->username;

    $status = "Activo";

    if($cliente==='')
    {
        $cliente = Cliente::create(array(
            'nombre'       =>    $nombre,
            'apellidos'    =>    $apellido,
            'empresa'      =>    $empresa,
            'telefono'     =>    $telefono,
            'direccion'    =>    $direccion
            ));

        if($cliente)
        {
            $cliente_id = $cliente->id;

        }
    }
    else
    {
        $cliente_id = $cliente;
    }



    $ticket = Ticket::create(array(
        'servicio_id'        =>    $servicio,
        'vehiculo'           =>    $vehiculo,
        'vehiculo_adicional' =>    $vehiculo_adicional,
        'operador_id'        =>    $operador,
        'horas_programadas'  =>    $horas_estimadas,
        'cliente_id'         =>    $cliente_id,
        'status_lugar'       =>    $status_lugar,
        'descripcion'        =>    $comments,
        'fecha_salida'       =>    $fecha_salida,
        'hora_salida'        =>    $hora_salida,
        'fecha_est_entrada'  =>    $fecha_est_entrada,
        'hora_est_entrada'   =>    $hora_est_entrada,
        'tiempo_servicio'    =>    $tiempo_servicio,
        'status'             =>    $status,
        'created_by'         =>    $user,
        'updated_by'         =>    $user,
        ));

    if ($ticket) {


     $rentado = DB::select('select * from vehiculos where nombre = "'.$vehiculo.'" and status = "rentado"');
     $rentado_a = DB::select('select * from vehiculos where nombre = "'.$vehiculo_adicional.'" and status = "rentado"');

     if(count($rentado) > 0)
     {
        $rentado = 'El vehículo '.$vehiculo.' ya se encuentra rentado. Por favor verifica las fechas';
    }
    elseif(count($rentado_a) > 0)
    {
        $rentado = 'El vehículo '.$vehiculo_adicional.' ya se encuentra rentado. Por favor verifica las fechas';
    }
    else
    {
        $rentado = '';
    }


    $ticket->clientes()->attach($cliente_id);   
    $ticket->servicios()->attach($servicio);
    $ticket->operadores()->attach($operador);



    $id = $ticket->id;

    $vehiculo_id = DB::table('vehiculos')->where('nombre', $vehiculo)->pluck('id');

    $vehiculo = Vehiculo::find($vehiculo_id);

    $vehiculo->status = 'rentado';

    $vehiculo->save();

    if(count($rentado_a) > 0)
    {
        $vehiculo_id = DB::table('vehiculos')->where('nombre', $vehiculo_adicional)->pluck('id');

        $vehiculo = Vehiculo::find($vehiculo_id);

        $vehiculo->status = 'rentado';

        $vehiculo->save();

    }

    





        /*return Redirect::route('imprimir-ticket', $ticket->id)
        ->with("create", "El ticket folio ".$id." ha sido creado");*/

        return Redirect::route('imprimir-ticket', array(
            'id' => $ticket->id,
            ))
        ->with("create", "El ticket número ".$id." ha sido creado. ".$rentado);
    }
}
/**
 * [getImprimirTicket muestra forma para imprimir tickets]
 * @param  [int] $id [id del ticket]
 * @return [vista]     [imprimir-salida]
 */
public function getImprimirTicket($id)
{
    $servicio_id   = DB::table('tickets')->where('id', $id)->pluck('servicio_id');
    $tipo          = DB::table('servicios')->where('id', $servicio_id)->pluck('tipo');
    $vehiculo      = DB::table('tickets')->where('id', $id)->pluck('vehiculo');
    $vehiculo_a     = DB::table('tickets')->where('id', $id)->pluck('vehiculo_adicional');
    $cliente_id    = DB::table('tickets')->where('id', $id)->pluck('cliente_id');
    $cliente       = Cliente::find($cliente_id);
    $ticket        = Ticket::find($id);


    return View::make('tickets.imprimir-salida', array(
        'link'    =>    'Imprimir ticket de salida',
        'id'      =>    $id,
        'tipo'    =>    $tipo,
        'vehiculo'=>    $vehiculo,
        'vehiculo_a'=>    $vehiculo_a,
        'cliente' =>    $cliente,
        'ticket'  =>    $ticket,
        ));
}

public function getCerrarTicket($id)
{
    $servicio_id   = DB::table('tickets')->where('id', $id)->pluck('servicio_id');
    $tipo          = DB::table('servicios')->where('id', $servicio_id)->pluck('tipo');
    $vehiculo      = DB::table('tickets')->where('id', $id)->pluck('vehiculo');
    $vehiculo_a     = DB::table('tickets')->where('id', $id)->pluck('vehiculo_adicional');
    $cliente_id    = DB::table('tickets')->where('id', $id)->pluck('cliente_id');
    $cliente       = Cliente::find($cliente_id);
    $ticket        = Ticket::find($id);


    return View::make('tickets.cerrar-ticket', array(
        'link'    =>    'Imprimir ticket de salida',
        'folio'   =>    $id,
        'tipo'    =>    $tipo,
        'vehiculo'=>    $vehiculo,
        'vehiculo_a'=>    $vehiculo_a,
        'cliente' =>    $cliente,
        'ticket'  =>    $ticket,
        ));
}

public function postCerrarTicket()
{
    $id               = Input::get('id');
    $folio            = Input::get('folio');
    $horas_reales     = Input::get('horas_reales');
    $fecha_entrada    = Input::get('fecha_entrada');
    $hora_entrada     = Input::get('hora_entrada');
    $precio           = Input::get('precio');
    $precio_total           = Input::get('precio_total');
    $user = Auth::user()->username;

    $ticket = Ticket::find($id);
    $ticket->folio = $folio;
    $ticket->horas_reales = $horas_reales;
    $ticket->fecha_entrada = $fecha_entrada;
    $ticket->hora_entrada = $hora_entrada;
    $ticket->status = "Cerrado";
    $ticket->costo = $precio;
    $ticket->costo_total = $precio_total;
    $ticket->updated_by = $user;
    $ticket->save();

    $vehiculo      = DB::table('tickets')->where('id', $id)->pluck('vehiculo');
    $vehiculo_a     = DB::table('tickets')->where('id', $id)->pluck('vehiculo_adicional');

    $vehiculo      = DB::table('vehiculos')->where('nombre', $vehiculo)->pluck('id');
    $vehiculo_a     = DB::table('vehiculos')->where('nombre', $vehiculo_a)->pluck('id');

    $vehiculo = Vehiculo::find($vehiculo);
    $vehiculo->status = '';
    $vehiculo->save();

    if(count($vehiculo_a) > 0 )
    {
      $vehiculo = Vehiculo::find($vehiculo_a);
      $vehiculo->status = '';
      $vehiculo->save();
  }
  

  return Redirect::route('imprimir-ticket', array(
    'id' => $id,
    ))
  ->with("create", "El ticket número ".$id." ha sido cerrado.");


}

public function postEditarTicket()
{
    $id                   =    Input::get('id');
    $vehiculo             =    Input::get('vehiculo');
    $vehiculo_adicional   =    Input::get('vehiculo_adicional');
    $operador             =    Input::get('operador');
    $fecha_salida         =    Input::get('fecha');
    $hora_salida          =    Input::get('hora');
    $fecha_est_entrada    =    Input::get('fecha_est_entrada');
    $hora_est_entrada     =    Input::get('hora_est_entrada');
    $horas_estimadas      =    Input::get('horas_estimadas');
    $comments             =    Input::get('comments');

    $ticket = Ticket::find($id);
    $ticket->vehiculo = $vehiculo;
    $ticket->vehiculo_adicional = $vehiculo_adicional;
    $ticket->operador_id = $operador;
    $ticket->fecha_salida = $fecha_salida;
    $ticket->hora_salida = $hora_salida;
    $ticket->fecha_est_entrada = $fecha_est_entrada;
    $ticket->hora_est_entrada = $hora_est_entrada;
    $ticket->horas_programadas = $horas_estimadas;
    $ticket->descripcion = $comments;

    $ticket->push();
    $ticket->save();

    DB::table('operador_ticket')
    ->where('ticket_id', $id)
    ->update(array('operador_id' => $operador));


    $vehiculo_id = DB::table('vehiculos')->where('nombre', $vehiculo)->pluck('id');

    $vehiculo = Vehiculo::find($vehiculo_id);

    $vehiculo->status = 'rentado';

    $vehiculo->save();

    if($vehiculo_adicional==='')
    {
        return Redirect::route('imprimir-ticket', array(
            'id' => $ticket->id,
            ))
        ->with("create", "El ticket número ".$id." ha sido editado.");
    }
    else
    {
     $vehiculo_id = DB::table('vehiculos')->where('nombre', $vehiculo_adicional)->pluck('id');


     $vehiculo = Vehiculo::find($vehiculo_id);

     $vehiculo->status = 'rentado';

     $vehiculo->save();

     return Redirect::route('imprimir-ticket', array(
        'id' => $ticket->id,
        ))
     ->with("create", "El ticket número ".$id." ha sido editado.");

 }



}





}
