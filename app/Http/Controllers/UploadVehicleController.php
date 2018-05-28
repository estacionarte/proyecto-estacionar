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
      $vehiculo = new Vehiculo;

      return view('cargar-vehiculo.upload_vehicle', compact('vehiculo'));
    }

    public function UploadVehicle(Request $request){
      $this->validate(
        $request,
        [
          'tipoVehiculo' => 'required',
          'marca'        => 'required_if:tipoVehiculo,Automóvil,Motocicleta',
          'modelo'       => 'required_if:tipoVehiculo,Automóvil,Motocicleta|max:45|string',
          'color'        => 'required|string|max:20',
          'patente'      => 'required_if:tipoVehiculo,Automóvil,Motocicleta'
        ],
        [
          'tipoVehiculo.required'  => 'Debe indicar un tipo de vehiculo.',
          'marca.required_if'      => 'Debe indicar la marca de su vehiculo.',
          'modelo.required_if'     => 'Debe indicar un modelo.',
          'modelo.max'             => 'Excedió la cantidad de carácteres.',
          'modelo.string'          => 'Debe indicar el nombre del modelo.',
          'color.required_if'      => 'Debe indicar el color de su vehiculo.',
          'color.string'           => 'Debe ingresar un color',
          'color.max'              => 'Excedió la cantidad de carácteres.',
          'patente.required_if'    => 'Debe completar la patente',
        ]);

        $vehiculo = new Vehiculo($request->all());

        $vehiculo->idUser = Auth::user()->id;
        $vehiculo->save();

        return redirect(route('profile-vehiculo'));
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
          'marca'        => 'required_if:tipoVehiculo,Automóvil,Motocicleta',
          'modelo'       => 'required_if:tipoVehiculo,Automóvil,Motocicleta|max:45',
          'color'        => 'required|string|max:20',
          'patente'      => 'required_if:tipoVehiculo,Automóvil,Motocicleta'
        ],
        [
          'tipoVehiculo.required'  => 'Debe indicar un tipo de vehiculo.',
          'marca.required_if'      => 'Debe indicar la marca de su vehiculo.',
          'modelo.required_if'     => 'Debe indicar un modelo.',
          'modelo.max'             => 'Excedió la cantidad de carácteres.',
          'color.required_if'      => 'Debe indicar el color de su vehiculo.',
          'color.string'           => 'Debe ingresar un color',
          'color.max'              => 'Excedió la cantidad de carácteres.',
          'patente.required_if'    => 'Debe completar la patente',
        ]);

        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->fill($request->all());
        $vehiculo->save();

        return redirect(route('profile-vehiculo'));
    }

    public function deleteVehicle($id){

        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return redirect(route('profile-vehiculo'));
    }

}
