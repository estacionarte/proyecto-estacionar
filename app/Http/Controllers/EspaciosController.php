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
        ->where('direccion', 'like', '%'.$request->input('search-espacios-input-direccion').'%')
        ->where('cant'.$request->input('search-espacios-vehiculo').'s','>',0)
        ->where('estadiaMinimaMinutos','<=',$tiempoestadia)
        ->where('estadiaMaximaMinutos','>=',$tiempoestadia)
        ->where('espacios.deleted_at', null)
        ->orderBy('espacios.created_at','desc')
        ->paginate(3);

      $espacios = $espacios->filter(function ($espacio, $key) use ($diallegada, $horariollegada, $horariopartida) {
          $diasYHorarios = $espacio->diasyhorarios()
            ->where('dia','=',$diallegada)
            ->where('horaComienzo','<=',$horariollegada)
            ->where('horaFin','>=',$horariopartida)
            ->count();

          return $diasYHorarios > 0;
      });

      // dd($espacios);


      /*
      $espacios = Espacio::with('fotos')
        // Join con tabla que tiene los dias y horarios de cada espacio
        ->join('espacios_diasyhorarios','espacios.id','=','espacios_diasyhorarios.idEspacio')
        ->select('*')
        ->where([
          // Filtro por direccion ingresada
          ['direccion', 'like', '%'.$request->input('search-espacios-input-direccion').'%'],
          // Filtro por vehiculo elegido y me aseguro de que el espacio acepte este tipo de vehiculos
          ['cant'.$request->input('search-espacios-vehiculo').'s','>',0],
          // // Filtro por día
          ['dia','=',$diallegada],
          // // Filtro por horario de entrada y salida
          ['horaComienzo','<=',$horariollegada],
          ['horaFin','>=',$horariopartida],
          // // Me aseguro de que la estadía sea mayor a la mínima permitida y menor a la máxima
          ['estadiaMinimaMinutos','<=',$tiempoestadia],
          ['estadiaMaximaMinutos','>=',$tiempoestadia],
          // Saco los espacios eliminados
          ['espacios.deleted_at', null]
        ])
        ->orderBy('espacios.created_at','desc')
        ->paginate(3);

      */

      return view('search-results', compact('espacios','horariollegada', 'horariopartida'));
    }

    public function showEspacio($id){

      $espacio = Espacio::findOrFail($id);

      $tiempominimo = $espacio->minutosEnDiasYHoras($espacio->estadiaMinimaMinutos);
      $tiempomaximo = $espacio->minutosEnDiasYHoras($espacio->estadiaMaximaMinutos);
      $anticipacion = $espacio->minutosEnDiasYHoras($espacio->anticipacionMinutos);

      return view('espacio', compact('espacio', 'tiempominimo', 'tiempomaximo', 'anticipacion'));
    }
}
