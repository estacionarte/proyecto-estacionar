<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquiler;
use App\Espacio;
use App\Vehiculo;
use DateTime;
use DB;

class AlquileresController extends Controller
{

  public function alquilar(Request $request, $id){

    $this->validate($request,
      [
        'vehiculo' => 'required',
        'alquiler-dia-comienzo' => 'required|date',
        'alquiler-hora-comienzo' => 'required|integer',
        'alquiler-minuto-comienzo' => 'required|integer',
        'alquiler-dia-fin' => 'required|date',
        'alquiler-hora-fin' => 'required|integer',
        'alquiler-minuto-fin' => 'required|integer',
      ]
    );

    $alquiler = new Alquiler();
    $alquiler->idEspacio = $id;
    $alquiler->idVehiculo = $request->input('vehiculo');


    // Convierto fechas de comienzo y fin a formatos guardables en DB
    $fechallegada = $request->input('alquiler-dia-comienzo') . ' ' . ($request->input('alquiler-hora-comienzo')<10 ? '0' . $request->input('alquiler-hora-comienzo') : $request->input('alquiler-hora-comienzo')) . ':' . ($request->input('alquiler-minuto-comienzo')<10 ? '0' . $request->input('alquiler-minuto-comienzo') : $request->input('alquiler-minuto-comienzo'));
    $fechallegada = DateTime::createFromFormat('Y-m-d H:i', $fechallegada);

    $fechapartida = $request->input('alquiler-dia-fin') . ' ' . ($request->input('alquiler-hora-fin')<10 ? '0' . $request->input('alquiler-hora-fin') : $request->input('alquiler-hora-fin')) . ':' . ($request->input('alquiler-minuto-fin')<10 ? '0' . $request->input('alquiler-minuto-fin') : $request->input('alquiler-minuto-fin'));
    $fechapartida = DateTime::createFromFormat('Y-m-d H:i', $fechapartida);

    // Los guardo
    $alquiler->fechaComienzoAlquiler = $fechallegada;
    $alquiler->fechaFinAlquiler = $fechapartida;

    // Obtengo el tipo de vehículo seleccionado
    $vehiculo = Vehiculo::findOrFail($request->input('vehiculo'));
    $tipoVehiculo = $vehiculo->tipoVehiculo;

    // Obtengo el espacio y hago un chequeo extra para ver si está disponible
    $espacio = Espacio::findOrFail($id);
    $disponible = $espacio->disponibleTodo($fechallegada, $fechapartida, $tipoVehiculo)['disponibleTodo'];
    // dd($espacio->disponibleTodo($fechallegada, $fechapartida, $tipoVehiculo));
    if (!$disponible) {
      return redirect()->route('home');
    }

    // Obtengo el precio final
    $alquiler->precioFinal = $espacio->precioFinal($fechallegada, $fechapartida);

    // Indico el estado
    $alquiler->estado = 'Pending Payment';

    // Guardo todo
    $alquiler->save();

    $alquiler_id = $alquiler->id;

    return redirect()->route('payMP',compact('alquiler_id'));
  }
}
