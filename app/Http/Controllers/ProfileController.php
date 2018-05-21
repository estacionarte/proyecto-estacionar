<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Espacio;
use App\FotoDeEspacio;
use App\Vehiculo;
use DB;
use Auth;
use Image;
use App\User;

class ProfileController extends Controller
{

  public function mostrarEspacios(Espacio $espacio){

    $espacios = DB::table('espacios')
    ->select('*')
    ->where([
      ['idUser', '=', Auth::user()->id],
      ['deleted_at', null]
    ])
    ->get();

    return view('profile.profile-espacio', compact('espacios'));
  }

  public function mostrarVehiculos(Vehiculo $vehiculo){

    $vehiculos = DB::table('vehiculos')
    ->select('*')
    ->where([
      ['idUser', '=', Auth::user()->id],
      ['deleted_at', null]
    ])
    ->get();

    return view('profile.profile-vehiculo', compact('vehiculos'));
  }

  protected function userProfile(Request $request, User $user){

    // SUBIR IMAGEN DE PERFIL
    if($request->hasFile('profilePic')){
      $avatar = $request->file('profilePic');
      $filename = Auth::user()->id . '-' . Auth::user()->firstName . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)
          ->resize(200, 200)
          ->save( public_path('/storage/profilePic/' . $filename ) );

      $user = Auth::user();
      $user->profilePic = $filename;
      $user->save();
    }

    // me traigo la fecha de la DB
    $fecha = DB::table('users')
    ->select('birthDate')
    ->where([
      ['id', '=', Auth::user()->id],
      ['birthDate', '=', Auth::user()->birthDate]
    ])
    ->first();

    // separo la fecha en tres campos para poder mostrarla en el form por separado
    $toArray = (array)$fecha;
    $toString = implode('-', $toArray);

    $diaMesAnio = explode('-', $toString);
    $dia = $diaMesAnio[0];
    $mes = $diaMesAnio[1];
    $anio = $diaMesAnio[2];

    return view ('profile.profile', compact('dia', 'mes', 'anio'));
  }


    public function uploadProfileData(Request $request, $id){

      $user = User::findOrFail($id);
      $user->fill($request->all());
      $user->save();
      return redirect(route('profile'));
    }

}
