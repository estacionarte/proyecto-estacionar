<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;
use Auth;

class UploadEstacionamientoController extends Controller
{

  public function showUploadEstacionamiento1(){

    return view('upload-estacionamiento.1infogeneral');
  }

  public function showUploadEstacionamiento2($id){

    $espacio = Espacio::findOrFail($id);

    return view('upload-estacionamiento.2estadias', compact('espacio'));
  }

  public function createEspacioAndShowUploadEstacionamiento2(Request $request){

    $pics = count($request->input('espacioPic'));

    $this->validate(
      $request,
      [
        'direccion' => 'required|string|max:45',
        'dpto' => 'nullable|string|max:45',
        'pais' => 'required|string|max:45',
        'provincia' => 'required|string|max:45',
        'ciudad' => 'required|string|max:45',
        'zipcode' => 'required|numeric|min:1000|max:9999',
        'tipoEspacio' => 'required|string|max:45',
        'cantAutos' => 'required|numeric|max:2',
        'cantMotos' => 'required|numeric|max:8',
        'cantBicicletas' => 'required|numeric|max:8',
        'aptoDiscapacitados' => 'nullable',
        'aptoElectricos' => 'nullable',
        'infopublica' => 'nullable|string|max:250',
        'infoprivada' => 'nullable|string|max:250',
        // foreach (range(0, $pics) as $index) {
        //   'espacioPic.' . $index => 'required|image|max:10000',
        // }
        // 'espacioPic[]' => 'required|image|max:10000',
      ]
    );

    // Registrar espacio
    $espacio = new Espacio($request->except('espacioPic'));
    $espacio->idUser = Auth::user()->id;
    $espacio->save();

    // Guardar nombre de foto en db y después archivo de foto

    // $fotosDeEspacio = new FotosDeEspacio($request->only('espacioPic'));
    // $fotosDeEspacio->idEspacio = $espacio->id;
    // $fotosDeEspacio->save();
    //
    // $nombreArchivo = $fotosDeEspacio->idEspacio . '-' . $fotosDeEspacio->id . '-' . $request->file('profilePic')->extension();
    // $path = $request->file('profilePic')->storePubliclyAs('public/espacios', $nombreArchivo);

    return redirect()->route('upload.estacionamiento.2',['id' => $espacio->id]);
    // return view('upload-estacionamiento.2estadias', compact('espacio'));
    // showUploadEstacionamiento2($espacio->id);
  }

  public function showUploadEstacionamiento3(){
    return view('upload-estacionamiento.3diasyhorarios');
  }

  public function insertAndShowUploadEstacionamiento3(){

    $this->validate($request,
      [
        'medidaDeTiempoMin' => 'required|string|max:45',
        'tiempoMinimo' => 'required|numeric|between:10,10000',
        'medidaDeTiempoMax' => 'required|string|max:45',
        'tiempoMaximo' => 'required|numeric|between:10,10000',
        'medidaDeTiempoAnt' => 'required|string|max:45',
        'tiempoAnticipacion' => 'required|numeric|between:10,10000',
      ]
    );

    if ($request->input('medidaDeTiempoMin') == 'Dias') {
      $minutosMinimo = $request->input('tiempoMinimo') * 24 * 60;
    }

    $espacio = Espacio::findOrFail($id);
    $espacio->fill($request->all());
    $espacio->save();

    return view('upload-estacionamiento.3diasyhorarios');
  }

  public function showUploadEstacionamiento4(){
    return view('upload-estacionamiento.4precios');
  }

  public function showUploadEstacionamientoResumen(){
    return view('upload-estacionamiento.resumen');
  }

}
