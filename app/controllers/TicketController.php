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
    $servicio      =    Servicio::find($tipo);
    $vehiculos     =    Vehiculo::where('servicio_id', '=', $tipo)->get();
    $vehiculos_a   =    Adicional::all();
    $clientes      =     Cliente::orderBy('razon_social', 'ASC')->get();

    return View::make('tickets.crear-ticket', array(
        'link'        =>   'Ticket de Salida',
        'servicio'    =>   $servicio,
        'vehiculos'   =>   $vehiculos,
        'vehiculos_a' =>   $vehiculos_a,
        'clientes'    =>   $clientes
        ));
}

/**
 * Muestra los tickets cerrados
 * @return vista tickets cerrados
 */
public function getTicketCerrados()
{
    $tickets=Ticket::with('cliente','vehiculo','adicional','operador')
    ->where('status', '=', 'Cerrado')->paginate(30);

    return View::make('tickets.cerrados', array(
        'link'      =>  'Tickets Cerrados',
        'tickets'   =>  $tickets
        ));
}

public function getTicketCancelados()
{
    $tickets=Ticket::with('cliente','vehiculo','adicional','operador')
    ->where('status', '=', 'Cancelado')->paginate(30);

    return View::make('tickets.cancelados', array(
        'link'      =>  'Tickets Cancelados',
        'tickets'   =>  $tickets
        ));
}


public function getEditarTicket($id)
{
    $ticket       = Ticket::find($id);
    $tipo         = $ticket->servicio_id;
    $operadores   = Operador::all();
    $vehiculos    = Vehiculo::where('servicio_id', '=', $tipo)->get();
    $vehiculos_a  = Adicional::all();

    return View::make('tickets.editar', array(
        'link'        => 'Editar Ticket',
        'ticket'      => $ticket,
        'operadores'  => $operadores,
        'vehiculos'   => $vehiculos,
        'vehiculos_a' => $vehiculos_a,
        ));
}

/**
 * [postCreateTicket guarda el ticket en la base de datos]
 * @return [route] [imprimir-ticket]
 */
public function postCreateTicket()
{	
    $validator = Validator::make(Input::all(),
        array(
            'fecha'             => 'required|date',
            'hora'              => 'required',
            'fecha_est_entrada' => 'date',
            'vehiculo'          => 'required'),
        array(
            'required' => 'Este campo es requerido',
            'date'     => 'No es una fecha valida',
            'required_without' => 'Este campo es requerido cliente'
            ));
    if($validator->fails())
    {
        return Redirect::back()
        ->withErrors($validator);
    }
    	//Recibe las variables de la forma
    $servicio             =    Input::get('tipo');
    $cliente              =    Input::get('cliente');
    $vehiculo             =    Input::get('vehiculo');
    $vehiculo_adicional   =    Input::get('vehiculo_adicional');
    $razon                =    Input::get('razon');
    $rfc                  =    Input::get('rfc');
    $email                =    Input::get('email');
    $telefono             =    Input::get('telefono');
    $calle                =    Input::get('calle');
    $num_ext              =    Input::get('num_ext');
    $colonia              =    Input::get('colonia');
    $ciudad               =    Input::get('ciudad');
    $operador             =    Input::get('operador');
    $fecha_salida         =    Input::get('fecha');
    $hora_salida          =    Input::get('hora');
    $fecha_est_entrada    =    Input::get('fecha_est_entrada');
    $hora_est_entrada     =    Input::get('hora_est_entrada');
    $horas_estimadas      =    Input::get('horas_estimadas');
    $status_lugar         =    Input::get('status_lugar');
    $tiempo_servicio      =    Input::get('tiempo_servicio');
    $comments             =    Input::get('comments');

    

    //Asigna a $user el nombre de usuario
    $user = Auth::user()->id;

    //Asigna status Activo al ticket
    $status = "Activo";

    // si el campo cliente esta vacio crea un nuevo cliente.
    if($cliente =='')
    {
        $cliente = Cliente::create(array(
            'razon_social' =>    $razon,
            'rfc'          =>    $rfc,
            'email'        =>    $email,
            'telefono'     =>    $telefono,
            'calle'        =>    $calle,
            'numero_ext'   =>    $num_ext,
            'colonia'      =>    $colonia,
            'ciudad'       =>    $ciudad,
            ));

        if($cliente)
        {
            //asigna el cliente recien creado
            $cliente_id = $cliente->id;

        }
    }
    else
    {
        //asigna el id del cliente recibido de la forma
        $cliente_id = $cliente;
    }



    //Crea el ticket
    $ticket = Ticket::create(array(
        'servicio_id'           =>    $servicio,
        'vehiculo_id'           =>    $vehiculo,
        'vehiculo_adicional_id' =>    $vehiculo_adicional,
        'operador_id'           =>    $operador,
        'horas_programadas'     =>    $horas_estimadas,
        'cliente_id'            =>    $cliente_id,
        'status_lugar'          =>    $status_lugar,
        'descripcion'           =>    $comments,
        'fecha_salida'          =>    $fecha_salida,
        'hora_salida'           =>    $hora_salida,
        'fecha_est_entrada'     =>    $fecha_est_entrada,
        'hora_est_entrada'      =>    $hora_est_entrada,
        'tiempo_servicio'       =>    $tiempo_servicio,
        'status'                =>    $status,
        'created_by'            =>    $user,
        'updated_by'            =>    $user,
        ));


//Si el ticket es creado verificar que el vehiculo no este rentando
    if ($ticket) {


     $rentado = DB::select('select * from vehiculos where id = "'.$vehiculo.'" and status = "rentado"');

     $rentado_a = DB::select('select * from adicionales where id = "'.$vehiculo_adicional.'" and status = "rentado"');

     if(count($rentado) > 0)
     {
        $rentado = 'El vehículo '.$ticket->vehiculo->nombre.' ya se encuentra rentado. Por favor verifica las fechas';
    }
    elseif(count($rentado_a) > 0)
    {
        $rentado = 'El vehículo adicional '.$ticket->adicional->nombre.' ya se encuentra rentado. Por favor verifica las fechas';
    }
    else
    {
        $rentado = '';
    }


    $id = $ticket->id;

    //Cambiar a Rentado el status del vehiculo
    $vehiculo = Vehiculo::find($vehiculo);

    $vehiculo->status = 'rentado';

    $vehiculo->save();

    if($ticket->vehiculo_adicional_id != '')
    {

        $vehiculo = Adicional::find($vehiculo_adicional);

        $vehiculo->status = 'rentado';

        $vehiculo->save();

    }

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

    $ticket   = Ticket::find($id);


    return View::make('tickets.imprimir-salida', array(
        'link'    =>    'Imprimir ticket de salida '.$id,
        'ticket'  =>    $ticket
        ));
}

public function getCerrarTicket($id)
{
    $ticket  = Ticket::find($id);

    return View::make('tickets.cerrar-ticket', array(
        'link'    =>    'Imprimir ticket de salida',
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
    $precio           = Input::get('precio_hora');
    $precio_total     = Input::get('precio_total');
    $comments         = Input::get('comments');
    $user = Auth::user()->id;

    $ticket = Ticket::find($id);
    $ticket->folio         = $folio;
    $ticket->horas_reales  = $horas_reales;
    $ticket->fecha_entrada = $fecha_entrada;
    $ticket->hora_entrada  = $hora_entrada;
    $ticket->status        = "Cerrado";
    $ticket->precio_hora   = $precio;
    $ticket->precio_total  = $precio_total;
    $ticket->descripcion   = $comments;
    $ticket->updated_by    = $user;
    $ticket->save();


    //busca si hay otros tickets con el vehiculo rentando
    $tickets = Ticket::where('vehiculo_id',$ticket->vehiculo_id)->where('status','Activo')->get();
    //si no hay vehiculos rentados por otros tickets cambia el status a null
    if(count($tickets) == 0 )
    {
      $vehiculo = Vehiculo::find($ticket->vehiculo_id);
      $vehiculo->status = '';
      $vehiculo->save();
  }

  
//busca si hay otros tickets con el vehiculo rentando
  if( $ticket->vehiculo_adicional_id != '' )
  {

      $tickets = Ticket::where('vehiculo_adicional_id',$ticket->vehiculo_adicional_id)->where('status','Activo')->get();
      //si no hay vehiculos rentados por otros tickets cambia el status a null
      if(count($tickets) == 0 )
      {
        $vehiculo = Adicional::find($ticket->vehiculo_adicional_id);
        $vehiculo->status = '';
        $vehiculo->save();
    }

}


return Redirect::route('imprimir-ticket', array(
    'id' => $id,
    ))
->with("create", "El ticket número ".$id." ha sido cerrado.");


}

/**
 * Editar ticket en la base de datos
 * @return redirect tickets
 */
public function postEditarTicket()
{
    $id                   =    Input::get('id');
    $user = Auth::user()->id;

    if(Input::has('edit'))
    {

        $vehiculo_id          =    Input::get('vehiculo');
        $vehiculo_adicional_id=    Input::get('vehiculo_adicional');
        $operador             =    Input::get('operador');
        $fecha_salida         =    Input::get('fecha');
        $hora_salida          =    Input::get('hora');
        $fecha_est_entrada    =    Input::get('fecha_est_entrada');
        $hora_est_entrada     =    Input::get('hora_est_entrada');
        $horas_estimadas      =    Input::get('horas_estimadas');
        $comments             =    Input::get('comments');

        $ticket = Ticket::find($id);

        $tickets = Ticket::where('vehiculo_id',$ticket->vehiculo_id)->where('status','Activo')->get();
    //si no hay vehiculos rentados por otros tickets cambia el status a null
        if(count($tickets) == 1 )
        {
          $vehiculo = Vehiculo::find($ticket->vehiculo_id);
          $vehiculo->status = '';
          $vehiculo->save();
      }


      if( $vehiculo_adicional_id != '' )
      {

          $tickets = Ticket::where('vehiculo_adicional_id',$ticket->vehiculo_adicional_id)->where('status','Activo')->get();
      //si no hay vehiculos rentados por otros tickets cambia el status a null
          if(count($tickets) == 1 )
          {
            $vehiculo = Adicional::find($ticket->vehiculo_adicional_id);
            $vehiculo->status = '';
            $vehiculo->save();
        }

    }   

    $ticket->vehiculo_id           = $vehiculo_id;
    $ticket->vehiculo_adicional_id = $vehiculo_adicional_id;
    $ticket->operador_id           = $operador;
    $ticket->fecha_salida          = $fecha_salida;
    $ticket->hora_salida           = $hora_salida;
    $ticket->fecha_est_entrada     = $fecha_est_entrada;
    $ticket->hora_est_entrada      = $hora_est_entrada;
    $ticket->horas_programadas     = $horas_estimadas;
    $ticket->descripcion           = $comments;
    $ticket->save();


    $vehiculo = Vehiculo::find($vehiculo_id);

    $vehiculo->status = 'rentado';

    $vehiculo->save();

    if($vehiculo_adicional_id == '')
    {
        return Redirect::route('imprimir-ticket', array(
            'id' => $ticket->id,
            ))
        ->with("create", "El ticket número ".$id." ha sido editado.");
    }
    
    else
    {

     $vehiculo = Adicional::find($vehiculo_adicional_id);

     $vehiculo->status = 'rentado';

     $vehiculo->save();

     return Redirect::route('imprimir-ticket', array(
        'id' => $ticket->id,
        ))
     ->with("create", "El ticket número ".$id." ha sido editado.");

 }
}
else
{

    $ticket = Ticket::find($id);
    
    $ticket->status        = "Cancelado";
    $ticket->updated_by    = $user;
    $ticket->save();


    //busca si hay otros tickets con el vehiculo rentando
    $tickets = Ticket::where('vehiculo_id',$ticket->vehiculo_id)->where('status','Activo')->get();
    //si no hay vehiculos rentados por otros tickets cambia el status a null
    if(count($tickets) == 0 )
    {
      $vehiculo = Vehiculo::find($ticket->vehiculo_id);
      $vehiculo->status = '';
      $vehiculo->save();
  }

  
//busca si hay otros tickets con el vehiculo rentando
  if( $ticket->vehiculo_adicional_id != '' )
  {

      $tickets = Ticket::where('vehiculo_adicional_id',$ticket->vehiculo_adicional_id)->where('status','Activo')->get();
      //si no hay vehiculos rentados por otros tickets cambia el status a null
      if(count($tickets) == 0 )
      {
        $vehiculo = Adicional::find($ticket->vehiculo_adicional_id);
        $vehiculo->status = '';
        $vehiculo->save();
    }

}

return Redirect::route('imprimir-ticket', array(
    'id' => $id,
    ))
->with("create", "El ticket número ".$id." ha sido cancelado.");


}




}


public function postPrecioEspecial()
{
    $precio_especial_hora  = Input::get('precio_especial_hora');
    $precio_especial_total = Input::get('precio_especial_total');
    $id                    = Input::get('id');

    $ticket = Ticket::find($id);
    $ticket->precio_especial_hora  = $precio_especial_hora;
    $ticket->precio_especial_total = $precio_especial_total;
    $ticket->save();


    return Redirect::route('imprimir-ticket', array(
        'id' => $ticket->id,
        ));

}

public function getReportes()
{
    return View::make('tickets.reportes', array(
        'link'  =>  'Reportes'
        ));
}


}
