<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquiler;
use App\Espacio;

class AlquileresController extends Controller
{
  public function alquilar(Request $request, $id){

    $this->validate($request,
      [
        'vehiculo' => 'required|string',
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
    $comienzo = $request->input('alquiler-dia-comienzo') . ' ' . $request->input('alquiler-hora-comienzo') . ':' . $request->input('alquiler-minuto-comienzo') . ':' . '00.000';

    $fin = $request->input('alquiler-dia-fin') . ' ' . $request->input('alquiler-hora-fin') . ':' . $request->input('alquiler-minuto-fin') . ':' . '00.000';

    // Los guardo
    $alquiler->fechaComienzoAlquiler = $comienzo;
    $alquiler->fechaFinAlquiler = $fin;

    // Obtengo el precio final
    $espacio = Espacio::findOrFail($id);
    $minutoComienzo = $request->input('alquiler-hora-comienzo') * 60 + $request->input('alquiler-minuto-comienzo');
    $minutoFin = $request->input('alquiler-hora-fin') * 60 + $request->input('alquiler-minuto-fin');
    $alquiler->precioFinal = $espacio->precioFinal($minutoComienzo, $minutoFin);

    // Guardo todo
    $alquiler->save();

    return redirect()->route('profile');
  }
}
