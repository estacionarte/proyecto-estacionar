<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Espacio;
use DB;
use DateTime;

class EspaciosController extends Controller
{

    public function search(Request $request){
      // Guardo las fechas en string
      $fechallegada = $request->input('search-espacios-dia-comienzo') . ' ' . ($request->input('search-espacios-hora-comienzo')<10 ? '0' . $request->input('search-espacios-hora-comienzo') : $request->input('search-espacios-hora-comienzo')) . ':' . ($request->input('search-espacios-minuto-comienzo')<10 ? '0' . $request->input('search-espacios-minuto-comienzo') : $request->input('search-espacios-minuto-comienzo'));
      $fechapartida = $request->input('search-espacios-dia-fin') . ' ' . ($request->input('search-espacios-hora-fin')<10 ? '0' . $request->input('search-espacios-hora-fin') : $request->input('search-espacios-hora-fin')) . ':' . ($request->input('search-espacios-minuto-fin')<10 ? '0' . $request->input('search-espacios-minuto-fin') : $request->input('search-espacios-minuto-fin'));

      // Convierto todo a formato fecha
      $fechallegada = DateTime::createFromFormat('Y-m-d H:i', $fechallegada);
      $fechapartida = DateTime::createFromFormat('Y-m-d H:i', $fechapartida);

      // Busco los espacios que estén disponibles usando la función del espacio
      // FALTA AGREGAR VERIFICACIÓN POR VEHÍCULO
      $espacios = Espacio::with("fotos")->get();
      $espacios = $espacios->filter(function ($espacio) use ($fechallegada, $fechapartida) {
        return $espacio->disponibleTodo($fechallegada, $fechapartida)['disponibleTodo'];
      });

      $direccion = $request->input('search-espacios-input-direccion');

      return view('search-results', compact('espacios','fechallegada', 'fechapartida', 'direccion'));
    }

    public function showEspacio($id){

      $espacio = Espacio::findOrFail($id);

      $tiempominimo = $espacio->minutosEnDiasYHoras($espacio->estadiaMinimaMinutos);
      $tiempomaximo = $espacio->minutosEnDiasYHoras($espacio->estadiaMaximaMinutos);
      $anticipacion = $espacio->minutosEnDiasYHoras($espacio->anticipacionMinutos);

      return view('espacio', compact('espacio', 'tiempominimo', 'tiempomaximo', 'anticipacion'));
    }

    // Función para traer el precio del alquiler según el horario introducido
    // Usado en search-results dentro del modal alquiler
    public function detalleAlquiler(Request $request){

      // Por seguridad, si no recibo petición por post no muestro nada
      if ($request->isMethod('post')) {
        $id = $request->id;
        $horariollegada = new DateTime($request->horariollegada);;
        $horariopartida = new DateTime($request->horariopartida);

        $espacio = Espacio::findOrFail($id);
        $precio = $espacio->precio($horariollegada, $horariopartida);

        $resultado = [
          // Si el cálculo del precio me da negativo por alguna fecha mal ingresada, no muestro valores
          'precio' => $precio > 0 ? $precio : '?',
          'descuento' => $precio > 0 ? $espacio->descuento($horariollegada, $horariopartida) : '?',
          'total' => $precio > 0 ? $espacio->precioFinal($horariollegada, $horariopartida) : '?'
        ];

        return response()->json($resultado);
      }

      // Si no vino por post devuelvo 0
      $resultado = [
        'precio' => '?',
        'descuento' => '?',
        'total' => '?'
      ];

      return response()->json($resultado);
    }

    public function disponible(Request $request){

      // Por seguridad, si no recibo petición por post no muestro nada
      if ($request->isMethod('post')) {
        $id = $request->id;
        $horariollegada = new DateTime($request->horariollegada);;
        $horariopartida = new DateTime($request->horariopartida);

        // Busco el espacio que quiero y ejecuto la función para ver si está disponible
        $espacio = Espacio::findOrFail($id);
        $disponibleTodo = $espacio->disponibleTodo($horariollegada, $horariopartida);

        return response()->json($disponibleTodo);
      }

      // Si no vino por post devuelvo alerta
      $disponibleTodo = [
        'disponibleTodo' => 'No se pudo verificar disponibilidad',
        'detalle' => [
          'minYMax' => '?',
          'diasYHorarios' => '?',
          'alquileres' => '?'
        ]
      ];

      return response()->json($disponibleTodo);

    }
}
