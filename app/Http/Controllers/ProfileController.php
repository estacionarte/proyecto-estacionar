<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;
use App\FotoDeEspacio;
use DB;
use Auth;

class ProfileController extends Controller
{
  public function mostrarPerfil(Espacio $espacio){

    $espacios = DB::table('espacios')
    ->select('*')
    ->where('idUser', '=', Auth::user()->id)
    ->get();

    return view('profile', compact('espacios'));
  }


}
