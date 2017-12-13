<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;

class SearchEspaciosController extends Controller
{

    public function search(Request $request){

      $espacios = Espacio::where('direccion', 'like', '%'.$request->input('search-espacios-input-direccion').'%')
      ->orderBy('created_at','descS')
      ->paginate(3);

      return view('search-results', compact('espacios'));
    }
}
