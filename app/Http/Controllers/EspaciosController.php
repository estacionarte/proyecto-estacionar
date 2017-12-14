<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;

class EspaciosController extends Controller
{

    public function search(Request $request){

      $espacios = Espacio::where('direccion', 'like', '%'.$request->input('search-espacios-input-direccion').'%')
      ->orderBy('created_at','descS')
      ->paginate(3);

      return view('search-results', compact('espacios'));
    }

    public function showEspacio($id){

      $espacio = Espacio::findOrFail($id);

      $tiempominimo = $espacio->minutosEnDiasYHoras($espacio->estadiaMinimaMinutos);
      $tiempomaximo = $espacio->minutosEnDiasYHoras($espacio->estadiaMaximaMinutos);
      $anticipacion = $espacio->minutosEnDiasYHoras($espacio->anticipacionMinutos);

      return view('espacio', compact('espacio', 'tiempominimo', 'tiempomaximo', 'anticipacion'));
    }
}
