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
      $vehiculo = new Vehiculo();

      return view('upload_vehicle', compact('vehiculo'));
    }

    public function UploadVehicle(Request $request){
      $this->validate(
        $request,
        [
          'tipoVehiculo' => 'required',
          'marca'        => 'required',
          'modelo'       => 'required|max:45',
          'color'        => 'required|string|max:20',
          'patente'      => 'required'
        ],
        [
          'tipoVehiculo.required'  => 'Debe indicar un tipo de vehiculo.',
          'marca.required'         => 'Debe indicar una marca.',
          'modelo.required'        => 'Debe indicar un modelo.',
          'modelo.max'             => 'Excedió la cantidad de carácteres.',
          'color.required'         => 'Debe indicar un color.',
          'color.string'           => 'Debe ingresar solo texto.',
          'color.max'              => 'Excedió la cantidad de carácteres.',
          'patente.required'       => 'Debe completar la patente',
        ]);

          $vehiculo = new Vehiculo($request->all());

          // $vehiculo->tipoVehiculo = $request->input('tipoVehiculo');
          // $vehiculo->marca        = $request->input('marca');
          // $vehiculo->modelo       = $request->input('modelo');
          // $vehiculo->color        = $request->input('color');
          // $vehiculo->patente      = $request->input('patente');

          $vehiculo->idUser = Auth::user()->id;
          $vehiculo->save();

          return redirect(route('profile'));
    }
}
