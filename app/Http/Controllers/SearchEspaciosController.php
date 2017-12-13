<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;

class SearchEspaciosController extends Controller
{

    public function search(Request $request){

      $espacios = Espacio::where('direccion', 'like', '%'.$request->input('search-espacios-input-direccion').'%')->orderBy('direccion')->paginate(3);


      // $espacios = Espacio::where('id', '>', 0)->orderBy('direccion')->paginate(3);

      // dd($espacios);

      return view('search-results', compact('espacios'));
    }
}
