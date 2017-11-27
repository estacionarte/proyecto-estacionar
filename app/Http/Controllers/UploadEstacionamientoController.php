<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadEstacionamientoController extends Controller
{

  public function showUploadEstacionamiento1(){
    return view('upload-estacionamiento.1infogeneral');
  }

  public function showUploadEstacionamiento2(){
    return view('upload-estacionamiento.2estadias');
  }

  public function createEspacio(Request $request){

    $this->validate(
      $request,
      [
        'direccion' => 'required|string|max:45',
        'dpto' => 'nullable|string|max:45',
        'pais' => 'required|string|max:45',
        'provincia' => 'required|string|max:45',
        'ciudad' => 'required|string|max:45',
        'zipcode' => 'required|numeric|max:5',
        'tipoEspacio' => 'required|string|max:45',
        'cantAutos' => 'required|numeric|max:2',
        'cantMotos' => 'required|numeric|max:8',
        'cantBicicletas' => 'required|numeric|max:8',
        'aptoDiscapacitados' => 'required',
        'aptoElectricos' => 'required',
        'infopublica' => 'nullable|string|max:250',
        'infoprivada' => 'nullable|string|max:250',
      ]
    );

    $espacio = new Espacio($request->all());

    dd($espacio);

    $espacio->save();

    // return view('upload-estacionamiento.2estadias');
    return redirect(route('upload.estacionamiento.2'));
  }

  public function showUploadEstacionamiento3(){
    return view('upload-estacionamiento.3diasyhorarios');
  }

  public function showUploadEstacionamiento4(){
    return view('upload-estacionamiento.4precios');
  }

  public function showUploadEstacionamientoResumen(){
    return view('upload-estacionamiento.resumen');
  }

}
