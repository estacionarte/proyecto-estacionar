<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;
use DB;

class ProfileController extends Controller
{
  public function mostrarPerfil(Espacio $espacio){
    $fotos = DB::table('espacios_fotos')
    ->select('*')
    ->where('idEspacio', '=', $espacio->id)
    ->get();
    return view('profile', compact('fotos'));
  }


}
