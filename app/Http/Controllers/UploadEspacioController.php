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
    $espacio->idUser = Auth::user()->id;
    $espacio->save();

    // Guardar nombre de foto en db y después archivo de foto

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
    return redirect()->route('upload.espacio.2',compact('espacio'));
  }

  public function insertAndShowUploadEspacio2(UploadEspacioRequest $request, $id){

    // Editar espacio
    $espacio = Espacio::findOrFail($id);
    $espacio->fill($request->except('espacioPic'));
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

    $diasSemana = [
      1 => 'Lunes',
      2 => 'Martes',
      3 => 'Miércoles',
      4 => 'Jueves',
      5 => 'Viernes',
      6 => 'Sábado',
      7 => 'Domingo',
    ];

    return view('upload-espacio.3diasyhorarios', compact('diasSemana', 'espacio'));
  }

  public function insertAndShowUploadEspacio4(Request $request, $id){

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

      $espacio = Espacio::findOrFail($id);
      $dia = $espacio->diasyhorarios()->where('dia',$value)->first();

      // Me fijo si tengo un horario para ese día ya guardado en la db y si no lo creo
      if ($dia) {
        $diasYHorariosDeEspacio = $espacio->diasyhorarios()->where('dia',$value)->first();
      } else {
        $diasYHorariosDeEspacio = new DiasYHorariosDeEspacio();
        $diasYHorariosDeEspacio->idEspacio = $espacio->id;
      }

      $horacomienzo = $request->input('horaComienzo' . $value) * 60 + $request->input('minutoComienzo' . $value);
      $horafin = $request->input('horaFin' . $value) * 60 + $request->input('minutoFin' . $value);

      $diasYHorariosDeEspacio->dia = $value;
      $diasYHorariosDeEspacio->horaComienzo = $horacomienzo;
      $diasYHorariosDeEspacio->horaFin = $horafin;

      $diasYHorariosDeEspacio->save();

    }

    return redirect()->route('upload.espacio.4',compact('espacio'));
  }

  public function showUploadEspacio4(Espacio $espacio){
    return view('upload-espacio.4precios', compact('espacio'));
  }

  public function insertAndShowUploadEspacioResumen(Request $request, $id){

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

  // Pasar de minutos (como está guardado en DB) a horas y días
  private function minutosEnDiasYHoras($minutos) {

    if ($minutos < 60) {
      $tiempo = $minutos . ' minutos';
      return $tiempo;
    } elseif ($minutos < 1440) {
      if ($minutos % 60 == 0) {
        if ($minutos / 60 == 1) {
          // Si es una hora exacta
          $tiempo = '1 hora';
          return $tiempo;
        }
        $tiempo = $minutos / 60 . ' horas';
        return $tiempo;
      }
      if (floor($minutos / 60) == 1) {
        $tiempo = floor($minutos / 60) . ' hora y ' . $minutos % 60 . ' minutos';
        return $tiempo;
      }
      $tiempo = floor($minutos / 60) . ' horas y ' . $minutos % 60 . ' minutos';
      return $tiempo;
    } else {
      if ($minutos % 60 == 0) {
        if ($minutos % 1440 == 0) {
          if ($minutos / 1440 == 1) {
            $tiempo = '1 día';
            return $tiempo;
          }
          $tiempo = $minutos / 1440 . ' días';
          return $tiempo;
        }
        if (floor($minutos / 1440) == 1) {
          if (floor($minutos % 1440 / 60) == 1) {
            $tiempo = '1 día y 1 hora';
            return $tiempo;
          }
          $tiempo = '1 día y ' . ($minutos % 1440 / 60) . ' horas';;
          return $tiempo;
        }
        if (floor($minutos % 1440 / 60) == 1) {
          $tiempo = floor($minutos / 1440) . ' días y 1 hora';
          return $tiempo;
        }
        $tiempo = floor($minutos / 1440) . ' días y ' . ($minutos % 1440 / 60) . ' horas';
        return $tiempo;
      }
      if (floor($minutos / 1440) == 1) {
        if (floor($minutos % 1440 / 60) == 1) {
          $tiempo = ' 1 día, 1 hora y ' . $minutos % 1440 % 60 . ' minutos';
          return $tiempo;
        }
        $tiempo = ' 1 día ' . floor($minutos % 1440 / 60) . ' horas y ' . $minutos % 1440 % 60 . ' minutos';
        return $tiempo;
      }
      if (floor($minutos % 1440 / 60) == 1) {
        $tiempo = floor($minutos / 1440) . ' días, 1 hora y ' . $minutos % 1440 % 60 . ' minutos';
        return $tiempo;
      }
      $tiempo = floor($minutos / 1440) . ' días, ' . floor($minutos % 1440 / 60) . ' horas y ' . $minutos % 1440 % 60 . ' minutos';
      return $tiempo;
    }

  }

  public function showUploadEspacioResumen(Espacio $espacio){

    $fotos = DB::table('espacios_fotos')
    ->select('*')
    ->where('idEspacio', '=', $espacio->id)
    ->get();

    $tiempominimo = $this->minutosEnDiasYHoras($espacio->estadiaMinimaMinutos);
    $tiempomaximo = $this->minutosEnDiasYHoras($espacio->estadiaMaximaMinutos);
    $anticipacion = $this->minutosEnDiasYHoras($espacio->anticipacionMinutos);

    $dias = DB::table('espacios_diasyhorarios')
      ->select('*')
      ->where('idEspacio', '=', $espacio->id)
      ->get();
    $horarios[] = '';
    // dd($dias);
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

}
