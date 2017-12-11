<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use Auth;
use DB;
use Storage;


class UploadVehicleController extends Controller
{
    public function showUploadVehicle(Vehiculo $vehiculo){

      $vehiculo = new Vehiculo();

      return view('cargar-vehiculo.upload_vehicle', compact('vehiculo'));
    }

    public function UploadVehicle(Request $request){
      $this->validate(
        $request,
        [
          'tipoVehiculo' => 'required',
          'marca'        => 'required_if:tipoVehiculo,Automovil,Camion,Camioneta,Motocicleta',
          'modelo'       => 'required_if:tipoVehiculo,Automovil,Camion,Camioneta,Motocicleta|max:45',
          'color'        => 'required|string|max:20',
          'patente'      => 'required_if:tipoVehiculo,Automovil,Camion,Camioneta,Motocicleta'
        ],
        [
          'tipoVehiculo.required'  => 'Debe indicar un tipo de vehiculo.',
          'marca.required_if'      => 'Debe indicar la marca de su vehiculo.',
          'modelo.required_if'     => 'Debe indicar un modelo.',
          'modelo.max'             => 'Excedió la cantidad de carácteres.',
          'color.required_if'      => 'Debe indicar el color de su vehiculo.',
          'color.string'           => 'Debe ingresar solo texto.',
          'color.max'              => 'Excedió la cantidad de carácteres.',
          'patente.required_if'    => 'Debe completar la patente',
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

    public function showEditVehicle($id){

          $vehiculo = Vehiculo::findOrFail($id);

          return view('cargar-vehiculo.edit-vehicle', compact('vehiculo'));
    }

    public function editvehicle(Request $request, $id){
      $this->validate(
        $request,
        [
          'tipoVehiculo' => 'required',
          'marca'        => 'required_if:tipoVehiculo,Automovil,Camion,Camioneta,Motocicleta',
          'modelo'       => 'required_if:tipoVehiculo,Automovil,Camion,Camioneta,Motocicleta|max:45',
          'color'        => 'required|string|max:20',
          'patente'      => 'required_if:tipoVehiculo,Automovil,Camion,Camioneta,Motocicleta'
        ],
        [
          'tipoVehiculo.required'  => 'Debe indicar un tipo de vehiculo.',
          'marca.required_if'      => 'Debe indicar la marca de su vehiculo.',
          'modelo.required_if'     => 'Debe indicar un modelo.',
          'modelo.max'             => 'Excedió la cantidad de carácteres.',
          'color.required_if'      => 'Debe indicar el color de su vehiculo.',
          'color.string'           => 'Debe ingresar solo texto.',
          'color.max'              => 'Excedió la cantidad de carácteres.',
          'patente.required_if'    => 'Debe completar la patente',
        ]);

        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->fill($request->all());
        $vehiculo->save();

        return redirect(route('profile'));
    }

    public function deleteVehicle($id){

        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return redirect(route('profile'));
    }

}
