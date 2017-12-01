<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;
use App\FotosDeEspacio;
use App\DiasYHorariosDeEspacio;
use Auth;

class UploadEstacionamientoController extends Controller
{

  public function showUploadEstacionamiento1(){
    $espacio = new Espacio();
    return view('upload-estacionamiento.1infogeneral', compact('espacio'));
  }

  public function showUploadEstacionamiento2(Espacio $espacio){

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

    return redirect()->route('upload.estacionamiento.2',compact('espacio'));
  }

  public function showUploadEstacionamiento3(Espacio $espacio){

    $diasSemana = [
      1 => 'Lunes',
      2 => 'Martes',
      3 => 'Miércoles',
      4 => 'Jueves',
      5 => 'Viernes',
      6 => 'Sábado',
      7 => 'Domingo',
    ];

    return view('upload-estacionamiento.3diasyhorarios', compact('diasSemana', 'espacio'));
  }

  public function insertAndShowUploadEstacionamiento3(Request $request, $id){

    $this->validate($request,
      [
        'medidaDeTiempoMin' => 'required|string|max:45',
        'tiempoMinimo' => 'required|numeric|between:1,10000',
        'medidaDeTiempoMax' => 'required|string|max:45',
        'tiempoMaximo' => 'required|numeric|between:1,10000',
        'medidaDeTiempoAnt' => 'required|string|max:45',
        'tiempoAnticipacion' => 'required|numeric|between:1,10000',
      ]
    );

    // Función para transformar toda la data recibida a minutos
    function transformarEnMinutos($medida, $tiempo){
      if ($medida == 'Dias') {
        $minutos = $tiempo * 24 * 60;
        return $minutos;
      } elseif ($medida == 'Horas') {
        $minutos = $tiempo * 60;
        return $minutos;
      } else {
        $minutos = $tiempo;
        return $minutos;
      }
    }

    // La ejecuto para los distintos campos
    $minutosMinimo = transformarEnMinutos($request->input('medidaDeTiempoMin'), $request->input('tiempoMinimo'));
    $minutosMaximo = transformarEnMinutos($request->input('medidaDeTiempoMax'), $request->input('tiempoMaximo'));
    $minutosAnticipacion = transformarEnMinutos($request->input('medidaDeTiempoAnt'), $request->input('tiempoAnticipacion'));

    // Guardo datos en registro existente
    $espacio = Espacio::findOrFail($id);
    $espacio->estadiaMinimaMinutos = $minutosMinimo;
    $espacio->estadiaMaximaMinutos = $minutosMaximo;
    $espacio->anticipacionMinutos = $minutosAnticipacion;

    // $espacio->fill($request->all());
    $espacio->save();

    return redirect()->route('upload.estacionamiento.3',compact('espacio'));
  }

  public function showUploadEstacionamiento4(Espacio $espacio){
    return view('upload-estacionamiento.4precios', compact('espacio'));
  }

  public function insertAndShowUploadEstacionamiento4(Request $request, $id){

    $this->validate($request,
      [
        'horaComienzoLunes' => 'required|numeric|between:0,23',
        'minutoComienzoLunes' => 'required|numeric|between:0,59',
        'horaFinLunes' => 'required|numeric|between:0,23',
        'minutoFinLunes' => 'required|numeric|between:0,59',
        'horaComienzoMartes' => 'required|numeric|between:0,23',
        'minutoComienzoMartes' => 'required|numeric|between:0,59',
        'horaFinMartes' => 'required|numeric|between:0,23',
        'minutoFinMartes' => 'required|numeric|between:0,59',
        'horaComienzoMiércoles' => 'required|numeric|between:0,23',
        'minutoComienzoMiércoles' => 'required|numeric|between:0,59',
        'horaFinMiércoles' => 'required|numeric|between:0,23',
        'minutoFinMiércoles' => 'required|numeric|between:0,59',
        'horaComienzoJueves' => 'required|numeric|between:0,23',
        'minutoComienzoJueves' => 'required|numeric|between:0,59',
        'horaFinJueves' => 'required|numeric|between:0,23',
        'minutoFinJueves' => 'required|numeric|between:0,59',
        'horaComienzoViernes' => 'required|numeric|between:0,23',
        'minutoComienzoViernes' => 'required|numeric|between:0,59',
        'horaFinViernes' => 'required|numeric|between:0,23',
        'minutoFinViernes' => 'required|numeric|between:0,59',
        'horaComienzoSábado' => 'required|numeric|between:0,23',
        'minutoComienzoSábado' => 'required|numeric|between:0,59',
        'horaFinSábado' => 'required|numeric|between:0,23',
        'minutoFinSábado' => 'required|numeric|between:0,59',
        'horaComienzoDomingo' => 'required|numeric|between:0,23',
        'minutoComienzoDomingo' => 'required|numeric|between:0,59',
        'horaFinDomingo' => 'required|numeric|between:0,23',
        'minutoFinDomingo' => 'required|numeric|between:0,59',
      ]
    );

    $DiasYHorariosDeEspacio = new DiasYHorariosDeEspacio;
    $espacio = Espacio::findOrFail($id);
    $DiasYHorariosDeEspacio->idEspacio = $espacio->id;
    $DiasYHorariosDeEspacio->dia = $request->input('');
    $DiasYHorariosDeEspacio->horaComienzo = $request->input('');
    $DiasYHorariosDeEspacio->horaFin = $request->input('');


    return redirect()->route('upload.estacionamiento.4',compact('espacio'));
  }

  public function showUploadEstacionamientoResumen(){
    return view('upload-estacionamiento.resumen');
  }

  public function insertAndShowUploadEstacionamientoResumen(){

    return view('upload-estacionamiento.resumen');
  }

}
