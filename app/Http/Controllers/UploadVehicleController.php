<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use Auth;
use DB;
use Storage;


class UploadVehicleController extends Controller
{
    public function showUploadVehicle(){
      return view('upload_vehicle');
    }

    public function UploadVehicle(Request $request){
      $this->validate($request, [
      'tipoVehiculo' => 'required',
      'marca'        => 'required',
      'modelo'       => 'required|max:45',
      'color'        => 'required|string|max:20',
      'patente'      => 'required'
    ],
    [
      'tipoVehiculo.required'  => 'Debe completar este campo.',
      'marca.required'         => 'Debe completar este campo.',
      'modelo.required'        => 'Debe completar este campo.',
      'modelo.max'             => 'Excedió la cantidad de carácteres.',
      'color.required'         => 'Debe completar este campo.',
      'color.string'           => 'Debe ingresar solo texto.',
      'color.max'              => 'Excedió la cantidad de carácteres.',
      'patente.required'       => 'Debe completar este campo',
    ]);

      $vehiculo = new Vehiculo();
      $vehiculo->save();
      return redirect(route('profile'));
    }
}
