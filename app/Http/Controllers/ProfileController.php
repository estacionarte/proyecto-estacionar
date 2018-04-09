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

  protected function dameFecha(User $user){

    $fecha = DB::table('users')
    ->select('birthDate')
    ->where([
      ['id', '=', Auth::user()->id],
      ['birthDate', '=', Auth::user()->birthDate]
    ])
    ->first();

    $toArray = (array)$fecha;
    $toString = implode('-', $toArray);

    $diaMesAnio = explode('-', $toString);
    $dia = $diaMesAnio[0];
    $mes = $diaMesAnio[1];
    $anio = $diaMesAnio[2];
    return view ('profile.profile', compact('dia', 'mes', 'anio'));
  }

    public function uploadProfileImage(Request $request){

        $user = Auth::user();
      if ($request->hasFile('profilePic')) {
        $profilePic =  $request->file('profilePic');
        $fileName = $user->id . '.' . $profilePic->getClientOriginalExtension();
        Image::make($profilePic)
            ->resize(400, 400)
            ->save( public_path('\storage\profilePic/' . $fileName) );

        $user->profilePic = $fileName;
        $user->save();
      }
      return view('/home');
    }

}
