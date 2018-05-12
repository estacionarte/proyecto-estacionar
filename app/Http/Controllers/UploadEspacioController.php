<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;
use App\FotoDeEspacio;
use App\DiasYHorariosDeEspacio;
use App\DescuentosDeEspacio;
use App\Http\Requests\UploadEspacioRequest;
use Auth;
use DB;
use Storage;

class UploadEspacioController extends Controller
{

  public function showUploadEspacio1(){
    $espacio = new Espacio();
    return view('upload-espacio.1infogeneral', compact('espacio'));
  }

  public function showEditarUploadEspacio1(Espacio $espacio){

    $fotos = DB::table('espacios_fotos')
    ->select('*')
    ->where('idEspacio', '=', $espacio->id)
    ->get();

    return view('upload-espacio.1infogeneral-edit', compact('espacio', 'fotos'));
  }

  public function createEspacioAndShowUploadEspacio2(UploadEspacioRequest $request){

    // Registrar espacio
    $espacio = new Espacio($request->except('espacioPic'));
    $espacio->lat = $request->input('lat');
    $espacio->lng = $request->input('lng');
    $espacio->idUser = Auth::user()->id;
    $espacio->cantAutos = $request->input('cantAutos') ? 1 : 0;
    $espacio->cantMotos = $request->input('cantMotos') ? 1 : 0;
    $espacio->cantBicicletas = $request->input('cantBicicletas') ? 1 : 0;
    $espacio->save();

    // Guardar nombre de foto en db y después archivo de foto
    if ($request->espacioPic) {
      foreach ($request->espacioPic as $photo) {
        $fotoDeEspacio = new FotoDeEspacio();
        $fotoDeEspacio->idEspacio = $espacio->id;
        if (isset($i)) {
          $i++;
        } else {
          $i = 1;
        }
        $nombreArchivo = $fotoDeEspacio->idEspacio . '-' . $i . '.' . $photo->extension();
        $fotoDeEspacio->photoname = $nombreArchivo;
        $fotoDeEspacio->save();

        $path = $photo->storePubliclyAs('public/espacios', $nombreArchivo);
      }
    }
    return redirect()->route('upload.espacio.2',compact('espacio'));
  }

  public function insertAndShowUploadEspacio2(UploadEspacioRequest $request, $id){

    // Editar espacio
    $espacio = Espacio::findOrFail($id);
    $espacio->fill($request->except('espacioPic'));
    $espacio->cantAutos = $request->input('cantAutos') ? 1 : 0;
    $espacio->cantMotos = $request->input('cantMotos') ? 1 : 0;
    $espacio->cantBicicletas = $request->input('cantBicicletas') ? 1 : 0;
    $espacio->lat = $request->input('lat');
    $espacio->lng = $request->input('lng');
    $espacio->save();


    $fotosespacio = DB::table('espacios_fotos')
      ->where('idEspacio',$espacio->id)
      ->count();

    if ($request->espacioPic) {
      foreach ($request->espacioPic as $photo) {
        $fotoDeEspacio = new FotoDeEspacio();
        $fotoDeEspacio->idEspacio = $espacio->id;
        if (isset($i)) {
          $i++;
        } else {
          if ($fotosespacio == 0) {
            $i = 1;
          } else {
            $i = $fotosespacio+1;
          }
        }
        $nombreArchivo = $fotoDeEspacio->idEspacio . '-' . $i . '.' . $photo->extension();
        $fotoDeEspacio->photoname = $nombreArchivo;
        $fotoDeEspacio->save();

        $path = $photo->storePubliclyAs('public/espacios', $nombreArchivo);

      }
    }
    return redirect()->route('upload.espacio.2',compact('espacio'));
  }

  public function deletePicEspacio($id){

    $foto = FotoDeEspacio::findOrFail($id);
    $espacio = Espacio::findOrFail($foto->idEspacio);

    $archivofoto = '/public/espacios/'. $foto->photoname;
    Storage::delete($archivofoto);

    $foto->delete();

    return redirect()->route('editar.upload.espacio.1',compact('espacio'));
  }

  public function showUploadEspacio2(Espacio $espacio){
    return view('upload-espacio.2estadias', compact('espacio'));
  }

  // Función para transformar toda la data recibida a minutos
  private function transformarEnMinutos($medida, $tiempo){
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

  public function insertAndShowUploadEspacio3(Request $request, $id){

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


    // La ejecuto para los distintos campos
    $minutosMinimo = $this->transformarEnMinutos($request->input('medidaDeTiempoMin'), $request->input('tiempoMinimo'));
    $minutosMaximo = $this->transformarEnMinutos($request->input('medidaDeTiempoMax'), $request->input('tiempoMaximo'));
    $minutosAnticipacion = $this->transformarEnMinutos($request->input('medidaDeTiempoAnt'), $request->input('tiempoAnticipacion'));

    // Guardo datos en registro existente
    $espacio = Espacio::findOrFail($id);
    $espacio->estadiaMinimaMinutos = $minutosMinimo;
    $espacio->estadiaMaximaMinutos = $minutosMaximo;
    $espacio->anticipacionMinutos = $minutosAnticipacion;

    $espacio->save();

    return redirect()->route('upload.espacio.3',compact('espacio'));
  }

  public function showUploadEspacio3(Espacio $espacio){

    $horarios = $espacio->diasyhorarios()->get();

    // Hago que la key sea el nombre del día, para después buscarlo fácilmente en el select
    $horarios = $horarios->keyBy('dia');

    return view('upload-espacio.3diasyhorarios', compact('horarios', 'espacio'));
  }

  public function insertAndShowUploadEspacio4(Request $request, $id){

    $this->validate($request,
      [
        'diasemana.*' => 'required|string',
        'horacomienzo.*' => 'required|numeric',
        'horafin.*' => 'required|numeric',
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

    $espacio = Espacio::findOrFail($id);

    foreach ($diasSemana as $key => $value) {

      $dia = $espacio->diasyhorarios()->where('dia',$value)->first();

      // Me fijo si tengo un horario para ese día ya guardado en la DB y si no lo creo
      // Chequeo si existe en DB
      if ($dia) {
        // Chequeo si en form está ingresado el día
        if ($request->input('diasemana.' . $value)) {
          // Actualizo valores
          $dia->horaComienzo = $request->input('horacomienzo.' . $value);
          $dia->horaFin =  $request->input('horafin.' . $value);
          $dia->save();
        } else {
          // Si no está en form, lo borro de DB
          // POR ALGUN MOTIVO CUANDO BORRO UN REGISTRO ME BORRA TODOS. FALTA VER BIEN QUÉ PASA ACÁ
          $dia->delete();
        }
      // Si no existe en DB
      } else {
        // Chequeo si en form está ingresado el día
        if ($request->input('diasemana.' . $value)) {
          // Lo creo en DB y le asigno valores
          $dia = new DiasYHorariosDeEspacio();
          $dia->idEspacio = $espacio->id;
          $dia->dia = $value;
          $dia->horaComienzo = $request->input('horacomienzo.' . $value);
          $dia->horaFin =  $request->input('horafin.' . $value);
          $dia->save();
        }
        // Si no está en form no hago nada
      }

    }

    return redirect()->route('upload.espacio.4',compact('espacio'));
  }

  public function showUploadEspacio4(Espacio $espacio){
    return view('upload-espacio.4precios', compact('espacio'));
  }

  public function insertAndShowUploadEspacioResumen(Request $request, $id){

    // Reemplazo coma por punto
    $newInput = str_replace(',','.',$request->input('precioPorMinuto'));
    $request->merge(['precioPorMinuto' => $newInput]);
    $this->validate($request,
    [
      'precioPorMinuto' => 'required|numeric|between:0,100',
      'descuentoPorMinutoHora' => 'required|numeric|between:0,99',
      'descuentoPorMinutoSeisHoras' => 'required|numeric|between:0,99',
      'descuentoPorMinutoDia' => 'required|numeric|between:0,99',
    ]);

    $espacio = Espacio::findOrFail($id);
    // Hasta que tengamos distintos precios para los distintos vehículos, le asigno a todos el mismo
    $espacio->precioAutosMinuto = $request->input('precioPorMinuto');
    $espacio->precioMotosMinuto = $request->input('precioPorMinuto');
    $espacio->precioBicicletasMinuto = $request->input('precioPorMinuto');

    $espacio->save();


    function guardar ($hora, $input, $espacio, $request){

      // Me fijo si tengo un descuento ya guardado en la db y si no lo creo
      $descuento = $espacio->descuentos()->where('hora',$hora)->first();
      if ($descuento) {
        $descuentosDeEspacio = $espacio->descuentos()->where('hora',$hora)->first();
      } else {
        $descuentosDeEspacio = new DescuentosDeEspacio();
        $descuentosDeEspacio->idEspacio = $espacio->id;
      }

      // Hasta que tengamos distintos precios para los distintos vehículos, le asigno a todos el mismo
      $descuentosDeEspacio->tipoVehiculo = 'Todos';
      $descuentosDeEspacio->hora = $hora;
      $descuentosDeEspacio->descuento = $request->input($input) / 100;

      $descuentosDeEspacio->save();
    }

    guardar(1, 'descuentoPorMinutoHora', $espacio, $request);
    guardar(6, 'descuentoPorMinutoSeisHoras', $espacio, $request);
    guardar(24, 'descuentoPorMinutoDia', $espacio, $request);

    return redirect()->route('upload.espacio.resumen',compact('espacio'));
  }

  public function showUploadEspacioResumen(Espacio $espacio){

    $fotos = DB::table('espacios_fotos')
    ->select('*')
    ->where('idEspacio', '=', $espacio->id)
    ->get();

    $tiempominimo = $espacio->minutosEnDiasYHoras($espacio->estadiaMinimaMinutos);
    $tiempomaximo = $espacio->minutosEnDiasYHoras($espacio->estadiaMaximaMinutos);
    $anticipacion = $espacio->minutosEnDiasYHoras($espacio->anticipacionMinutos);

    $dias = DB::table('espacios_diasyhorarios')
      ->select('*')
      ->where('idEspacio', '=', $espacio->id)
      ->get();
    $horarios = [];
    $dias = $dias->toArray();

    foreach ($dias as $dia) {
      $horaComienzo = $espacio->comienzo($dia->dia);
      $horaFin = $espacio->fin($dia->dia);
      $horarios[] = $dia->dia . ': ' . $horaComienzo . ' - ' . $horaFin;
    }

    $descuentos = DB::table('espacios_descuentos')
      ->select('*')
      ->where('idEspacio', '=', $espacio->id)
      ->get();

    return view('upload-espacio.resumen', compact('espacio', 'fotos', 'tiempominimo', 'tiempomaximo', 'anticipacion', 'horarios', 'descuentos'));
  }

  public function deleteEspacio($id){
    $espacio = Espacio::findOrFail($id);

    //Borro los descuentos
    $descuentos = $espacio->descuentos()->get();
    foreach ($descuentos as $descuento) {
      $descuento->delete();
    }

    //Borro los diasyhorarios
    $diasyhorarios = $espacio->diasyhorarios()->get();
    foreach ($diasyhorarios as $diayhorario) {
      $diayhorario->delete();
    }

    //Borro las fotos
    $fotos = $espacio->fotos()->get();
    foreach ($fotos as $foto) {
      $archivofoto = '/public/espacios/'. $foto->photoname;
      Storage::delete($archivofoto);
      $foto->delete();
    }

    //Borro el espacio
    $espacio->delete();

    return redirect()->route('profile');
  }

}
