<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;
use DB;
use Auth;

class ProfileController extends Controller
{
  public function mostrarPerfil(Espacio $espacio){

    $espacios = DB::table('espacios')
    ->select('*')
    ->where('idUser', '=', Auth::user()->id)
    ->get();

    foreach ($espacios as $espacio) {
      $fotos = DB::table('espacios_fotos')
      ->select('*')
      ->where('idEspacio', '=', $espacio->id)
      ->get();
    }

    return view('profile', compact('espacios', 'fotos'));
  }


}
