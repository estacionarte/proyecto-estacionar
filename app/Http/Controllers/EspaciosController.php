<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Espacio;
use DB;

class EspaciosController extends Controller
{

    public function search(Request $request){

      // Convierto las fechas en día de semana en español y los horarios en minutos

      setlocale(LC_ALL,"es_ES");
      $hora = strtotime($request->input('search-espacios-dia-comienzo'));
      $diallegada = ucwords(strftime("%A",$hora));
      $horariollegada = $request->input('search-espacios-hora-comienzo') * 60 + $request->input('search-espacios-minuto-comienzo');

      $diapartida = date('l',strtotime($request->input('search-espacios-dia-fin')));
      $horariopartida = $request->input('search-espacios-hora-fin') * 60 + $request->input('search-espacios-minuto-fin');

      $tiempoestadia = $horariopartida-$horariollegada;

      $espacios = Espacio::with("fotos")
        // Filtro por vehiculo elegido y me aseguro de que el espacio acepte este tipo de vehiculos
        ->where('cant'.$request->input('search-espacios-vehiculo').'s','>',0)
        // Me aseguro de que la estadía sea mayor a la mínima permitida y menor a la máxima
        ->where('estadiaMinimaMinutos','<=',$tiempoestadia)
        ->where('estadiaMaximaMinutos','>=',$tiempoestadia)
        // Saco los espacios eliminados
        ->where('espacios.deleted_at', null)
        ->orderBy('espacios.created_at','desc')
        ->paginate(3);

      $espacios = $espacios->filter(function ($espacio, $key) use ($diallegada, $horariollegada, $horariopartida) {
          $diasYHorarios = $espacio->diasyhorarios()
            // Filtro por día
            ->where('dia','=',$diallegada)
            // // Filtro por horario de entrada y salida
            ->where('horaComienzo','<=',$horariollegada)
            ->where('horaFin','>=',$horariopartida)
            ->count();

          return $diasYHorarios > 0;
      });

      $direccion = $request->input('search-espacios-input-direccion');

      // Guardo fecha, hora y minuto para persistir datos de búsqueda
      $diacomienzo = $request->input('search-espacios-dia-comienzo');
      $horacomienzo = $request->input('search-espacios-hora-comienzo');
      $minutocomienzo = $request->input('search-espacios-minuto-comienzo');
      $diafin = $request->input('search-espacios-dia-fin');
      $horafin = $request->input('search-espacios-hora-fin');
      $minutofin = $request->input('search-espacios-minuto-fin');

      return view('search-results', compact('espacios','horariollegada', 'horariopartida', 'direccion', 'diacomienzo', 'horacomienzo', 'minutocomienzo', 'diafin', 'horafin', 'minutofin'));
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
        $horariollegada = $request->horariollegada;
        $horariopartida = $request->horariopartida;

        $espacio = Espacio::findOrFail($id);
        $precio = $espacio->precio($horariollegada, $horariopartida);

        $resultado = [
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

}
