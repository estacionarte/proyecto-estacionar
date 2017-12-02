<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;
use App\FotoDeEspacio;
use App\DiasYHorariosDeEspacio;
use App\DescuentosDeEspacio;
use App\Http\Requests\UploadEspacioRequest;
use Auth;

class UploadEstacionamientoController extends Controller
{

  public function showUploadEstacionamiento1(){
    $espacio = new Espacio();
    return view('upload-estacionamiento.1infogeneral', compact('espacio'));
  }

  public function showEditarUploadEstacionamiento1(Espacio $espacio){
    // $espacio = Espacio::findOrFail($id);
    return view('upload-estacionamiento.1infogeneral-edit', compact('espacio'));
  }

  public function showUploadEstacionamiento2(Espacio $espacio){

    return view('upload-estacionamiento.2estadias', compact('espacio'));
  }

  public function createEspacioAndShowUploadEstacionamiento2(UploadEspacioRequest $request){

    // Registrar espacio
    $espacio = new Espacio($request->except('espacioPic'));
    $espacio->idUser = Auth::user()->id;
    $espacio->save();

    // Guardar nombre de foto en db y después archivo de foto

    foreach ($request->espacioPic as $photo) {
      $fotoDeEspacio = new FotoDeEspacio();
      $fotoDeEspacio->idEspacio = $espacio->id;
      if ($fotoDeEspacio->id) {
        $i = $fotoDeEspacio->id + 1;
      } elseif (isset($i)) {
        $i++;
      } else {
        $i = 1;
      }
      $nombreArchivo = $fotoDeEspacio->idEspacio . '-' . $i . '.' . $photo->extension();
      $fotoDeEspacio->photoname = $nombreArchivo;
      $fotoDeEspacio->save();

      $path = $photo->storePubliclyAs('public/espacios', $nombreArchivo);

    }

    return redirect()->route('upload.estacionamiento.2',compact('espacio'));
  }

  public function insertAndShowUploadEstacionamiento2(UploadEspacioRequest $request, $id){

    // Editar espacio
    $espacio = Espacio::findOrFail($id);
    $espacio->fill($request->except('espacioPic'));
    $espacio->save();

    foreach ($request->espacioPic as $photo) {
      $fotoDeEspacio = new FotoDeEspacio();
      $fotoDeEspacio->idEspacio = $espacio->id;
      if ($fotoDeEspacio->id) {
        $i = $fotoDeEspacio->id + 1;
      } elseif (isset($i)) {
        $i++;
      } else {
        $i = 1;
      }
      $nombreArchivo = $fotoDeEspacio->idEspacio . '-' . $i . '.' . $photo->extension();
      $fotoDeEspacio->photoname = $nombreArchivo;
      $fotoDeEspacio->save();

      $path = $photo->storePubliclyAs('public/espacios', $nombreArchivo);

    }

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

    $diasSemana = [
      1 => 'Lunes',
      2 => 'Martes',
      3 => 'Miércoles',
      4 => 'Jueves',
      5 => 'Viernes',
      6 => 'Sábado',
      7 => 'Domingo',
    ];

    foreach ($diasSemana as $key => $value) {

      $diasYHorariosDeEspacio = new DiasYHorariosDeEspacio();
      $espacio = Espacio::findOrFail($id);

      $diasYHorariosDeEspacio->idEspacio = $espacio->id;

      $horacomienzo = $request->input('horaComienzo' . $value) * 60 + $request->input('minutoComienzo' . $value);
      $horafin = $request->input('horaFin' . $value) * 60 + $request->input('minutoFin' . $value);

      $diasYHorariosDeEspacio->dia = $value;
      $diasYHorariosDeEspacio->horaComienzo = $horacomienzo;
      $diasYHorariosDeEspacio->horaFin = $horafin;

      $diasYHorariosDeEspacio->save();

    }

    return redirect()->route('upload.estacionamiento.4',compact('espacio'));
  }

  public function showUploadEstacionamientoResumen(Espacio $espacio){
    return view('upload-estacionamiento.resumen', compact('espacio'));
  }

  public function insertAndShowUploadEstacionamientoResumen(Request $request, $id){

    $this->validate($request,
    [
      'precioPorMinuto' => 'required|numeric|between:0,100',
      'descuentoPorMinutoHora' => 'required|numeric|between:0,99',
      'descuentoPorMinutoSeisHoras' => 'required|numeric|between:0,99',
      'descuentoPorMinutoDia' => 'required|numeric|between:0,99',
    ]);

    $espacio = Espacio::findOrFail($id);
    $espacio->precioAutosMinuto = $request->input('precioPorMinuto');
    $espacio->precioMotosMinuto = $request->input('precioPorMinuto');
    $espacio->precioBicicletasMinuto = $request->input('precioPorMinuto');

    $espacio->save();

    $descuentosDeEspacio = new DescuentosDeEspacio();
    $descuentosDeEspacio->idEspacio = $espacio->id;
    $descuentosDeEspacio->tipoVehiculo = 'Todos';
    $descuentosDeEspacio->hora = 1;
    $descuentosDeEspacio->descuento = $request->input('descuentoPorMinutoHora') / 100;

    $descuentosDeEspacio->save();

    $descuentosDeEspacio = new DescuentosDeEspacio();
    $descuentosDeEspacio->idEspacio = $espacio->id;
    $descuentosDeEspacio->tipoVehiculo = 'Todos';
    $descuentosDeEspacio->hora = 6;
    $descuentosDeEspacio->descuento = $request->input('descuentoPorMinutoSeisHoras') / 100;

    $descuentosDeEspacio->save();

    $descuentosDeEspacio = new DescuentosDeEspacio();
    $descuentosDeEspacio->idEspacio = $espacio->id;
    $descuentosDeEspacio->tipoVehiculo = 'Todos';
    $descuentosDeEspacio->hora = 24;
    $descuentosDeEspacio->descuento = $request->input('descuentoPorMinutoDia') / 100;

    $descuentosDeEspacio->save();

    return redirect()->route('upload.estacionamiento.resumen',compact('espacio'));
  }

}
