<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTime;

class Espacio extends Model
{
  use SoftDeletes;

  protected $table = 'espacios';

  protected $fillable = [
    'idUser',
    'direccion',
    'pais',
    'provincia',
    'ciudad',
    'zipcode',
    'tipoEspacio',
    'cantAutos',
    'cantMotos',
    'cantBicicletas',
    'aptoDiscapacitados',
    'aptoElectricos',
    'infopublica',
    'infoprivada',
    'estadiaMinimaMinutos',
    'estadiaMaximaMinutos',
    'anticipacionMinutos',
    'precioAutosMinuto',
    'precioMotosMinuto',
    'precioBicicletasMinuto',
    'nombre',
    'necesita_confirmacion',
    'aprobado',
    'disponible'
  ];

  public function usuario()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

  public function fotos()
    {
        return $this->hasMany(FotoDeEspacio::class, 'idEspacio');
    }

  public function descuentos()
    {
        return $this->hasMany(DescuentosDeEspacio::class, 'idEspacio');
    }

  public function diasyhorarios()
    {
        return $this->hasMany(DiasYHorariosDeEspacio::class, 'idEspacio');
    }

  // Pasar minutos a horario
  public function minutosEnHoraDelDia($minutos){

    if ($minutos == 0) {
      $hora = '00:00';
      return $hora;
    } elseif ($minutos % 60 == 0) {
      $hora = $minutos / 60 . ':00';
      return $hora;
    } else {
      $hora = floor($minutos / 60) . ':' . ($minutos % 60);
      return $hora;
    }
  }

  // Hora comienzo de disponibilidad de espacio
  public function comienzo($dia){
    $dias = $this->diasyhorarios()->where('dia',$dia)->first();
    return $this->minutosEnHoraDelDia($dias->horaComienzo);
  }

  // Hora fin de la disponibilidad
  public function fin($dia){
    $dias = $this->diasyhorarios()->where('dia',$dia)->first();
    return $this->minutosEnHoraDelDia($dias->horaFin);
  }

  public function getDescuento($hora){
    $descuento = $this->descuentos()->where('hora',$hora)->first();
    return $descuento->descuento;
  }

  // Función para chequear si espacio tiene foto cargada (devuelve true) si no devuelve false
  public function hayfoto(){
    $fotos = $this->fotos()->first();
    if (!$fotos) {
      $hayfoto = false;
    } else {
      $hayfoto = true;
    }
    return $hayfoto;
  }

  public function fotoPortada(){
    $foto = $this->fotos()->first();
    return $foto->photoname;
  }

  // Pasar de minutos (como está guardado en DB) a horas y días
  public function minutosEnDiasYHoras($minutos) {

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

  // Obtener precio total del alquiler en base a las fechas de estadía
  public function precio(DateTime $fechallegada, DateTime $fechapartida){
    // Calculo la estadía en minutos
    $cantidadMinutosAlquiler = $this->estadiaEnMinutos($fechallegada, $fechapartida);

    // Hago los calculos

    $precioSinDescuentos = round($cantidadMinutosAlquiler * $this->precioAutosMinuto);

    return $precioSinDescuentos;
  }


  public function descuento(DateTime $fechallegada, DateTime $fechapartida){
    // Calculo la estadía en minutos
    $cantidadMinutosAlquiler = $this->estadiaEnMinutos($fechallegada, $fechapartida);

    // Hago los calculos
    $precioSinDescuentos = $cantidadMinutosAlquiler * $this->precioAutosMinuto;
    if ($cantidadMinutosAlquiler>=1440) {
      $descuento = round(($this->getDescuento(24)) * $precioSinDescuentos);
    } elseif ($cantidadMinutosAlquiler>=360) {
      $descuento = round(($this->getDescuento(6)) * $precioSinDescuentos);
    } elseif ($cantidadMinutosAlquiler>=60) {
      $descuento = round(($this->getDescuento(1)) * $precioSinDescuentos);
    } else {
      $descuento = 0;
    }
    return $descuento;
  }


  public function precioFinal(DateTime $fechallegada, DateTime $fechapartida){
    // Calculo la estadía en minutos
    $cantidadMinutosAlquiler = $this->estadiaEnMinutos($fechallegada, $fechapartida);

    // Hago los calculos
    $precioSinDescuentos = $cantidadMinutosAlquiler * $this->precioAutosMinuto;
    if ($cantidadMinutosAlquiler>=1440) {
      $precioFinal = round((1 - $this->getDescuento(24)) * $precioSinDescuentos);
    } elseif ($cantidadMinutosAlquiler>=360) {
      $precioFinal = round((1 - $this->getDescuento(6)) * $precioSinDescuentos);
    } elseif ($cantidadMinutosAlquiler>=60) {
      $precioFinal = round((1 - $this->getDescuento(1)) * $precioSinDescuentos);
    } else {
      $precioFinal = round($precioSinDescuentos);
    }
    return $precioFinal;
  }


  // Función para calcular duración de estadía en minutos
  public function estadiaEnMinutos(DateTime $fechallegada, DateTime $fechapartida){

    // Si la fecha de partida es menor a la de llegada, devuelvo 0
    if ($fechapartida<=$fechallegada) {
      $estadiaEnMinutos = 0;
    } else {
      // Diferencia de días entre fechas arrojando como resultado un DateInterval
      $diferencia = date_diff($fechapartida,$fechallegada);

      // Lo paso todo a minutos
      $estadiaEnMinutos = $diferencia->d * 1440 + $diferencia->h * 60 + $diferencia->i;
    }

    return $estadiaEnMinutos;

  }


  // Función para saber si el espacio acepta la estadía solicitada en base a tiempos mínimos y máximos
  public function disponibleMinYMax(DateTime $fechallegada, DateTime $fechapartida){

    $estadiaEnMinutos = $this->estadiaEnMinutos($fechallegada, $fechapartida);

    // Si la estadía es mayor que la mínima aceptada por la cochera y menor que la máxima devuelvo true
    if (($estadiaEnMinutos >= $this->estadiaMinimaMinutos) && ($estadiaEnMinutos <= $this->estadiaMaximaMinutos)) {
      return true;
    }

    return false;
  }


  // Función para obtener el día de la semana en español a partir de una fecha introducida
  public function diaEnEspanol(DateTime $fecha){

    $dia = $fecha->format("l");

    if ($dia == 'Monday') {
      $diaEnEspanol = 'Lunes';
    } elseif ($dia == 'Tuesday') {
      $diaEnEspanol = 'Martes';
    } elseif ($dia == 'Wednesday') {
      $diaEnEspanol = 'Miércoles';
    } elseif ($dia == 'Thursday') {
      $diaEnEspanol = 'Jueves';
    } elseif ($dia == 'Friday') {
      $diaEnEspanol = 'Viernes';
    } elseif ($dia == 'Saturday') {
      $diaEnEspanol = 'Sábado';
    } elseif ($dia == 'Sunday') {
      $diaEnEspanol = 'Domingo';
    }

    return $diaEnEspanol;
  }


  // Función para saber si el espacio acepta la estadía solicitada en base a los horarios aceptados para los días de la estadía
  public function disponibleDiasYHorarios(DateTime $fechallegada, DateTime $fechapartida){

    // Guardo los horarios de las fechas buscadas en minutos
    $llegadaMinutos = $fechallegada->format('H') * 60 + $fechallegada->format('i');
    $partidaMinutos = $fechapartida->format('H') * 60 + $fechapartida->format('i');

    // Obtengo diasYHorarios del espacio para chequear disponibilidad
    $diasYHorarios = DiasYHorariosDeEspacio::where('idEspacio', $this->id)->get();

    // Obtengo los datos para el día de llegada
    $diaEnEspanolLlegada = $this->diaEnEspanol($fechallegada);
    $diaLlegada = $diasYHorarios->where('dia',$diaEnEspanolLlegada)->first();

    // Obtengo los datos para el día de partida
    $diaEnEspanolPartida = $this->diaEnEspanol($fechapartida);
    $diaPartida = $diasYHorarios->where('dia',$diaEnEspanolPartida)->first();

    // Comienzo verificación de disponibilidad
    // Si la reserva se hace dentro del mismo día solo chequeo los horarios del espacio para ese día
    if ($fechallegada->format("Y-m-d") == $fechapartida->format("Y-m-d")) {
      // Si la estadía solicitada está dentro del tiempo en que el espacio está disponible devuelvo true
      if ($diaLlegada->horaComienzo <= $llegadaMinutos && $diaPartida->horaFin >= $partidaMinutos) {
        return true;
      }
    // Si la reserva se hace para días consecutivos tengo que asegurarme que el primer día esté disponible hasta las 23:59 y el que le sigue a partir de las 00:00, además de estar disponible para la llegada y la partida
  } elseif ($fechallegada->modify('+1 day')->format("Y-m-d") == $fechapartida->format("Y-m-d")) {
    // Vuelvo a día original de fecha llegada (porque se le sumó un día con el modify)
    $fechallegada->modify('-1 day');
    // Hago verificaciones y las guardo en variables
    // Disponible para el comienzo de la estadía?
    $disponibleLlegada = $diaLlegada->horaComienzo <= $llegadaMinutos;
    // Disponible para el final de la estadía?
    $disponiblePartida = $diaPartida->horaFin >= $partidaMinutos;
    // Disponible el día de llegada hasta las 23:59 / 1439 minutos?
    $disponibleHastaFinalDiaLlegada = $diaLlegada->horaFin == 1439;
    // Disponible el día de partida desde las 00:00 / 0 minutos?
    $disponibleDesdeComienzoDiaPartida = $diaPartida->horaComeizno == 00;
    // Si todas las variables dan true, retorno true
    if ($disponibleLlegada && $disponiblePartida && $disponibleHastaFinalDiaLlegada && $disponibleDesdeComienzoDiaPartida) {
      return true;
    }
    // Si la reserva se hace a lo largo de varios días, tengo que asegurarme que esté disponible para llegada y partida, que el primer día esté disponible hasta las 23:59 y el último a partir de las 00:00 y que todos los que estén en el medio estén disponibles desde las 00:00 hasta las 23:59
  } else {
    // Hago verificaciones y las guardo en variables
    // Disponible para el comienzo de la estadía?
    $disponibleLlegada = $diaLlegada->horaComienzo <= $llegadaMinutos;
    // Disponible para el final de la estadía?
    $disponiblePartida = $diaPartida->horaFin >= $partidaMinutos;
    // Disponible el día de llegada hasta las 23:59 / 1439 minutos?
    $disponibleHastaFinalDiaLlegada = $diaLlegada->horaFin == 1439;
    // Disponible el día de partida desde las 00:00 / 0 minutos?
    $disponibleDesdeComienzoDiaPartida = $diaPartida->horaComeizno == 00;
    // Disponible cada día intermedio de 00:00 a 23:59?
    // Vuelvo a día original de fecha llegada (porque se le sumó un día con el modify del if anterior)
    $fechallegada->modify('-1 day');
    // Calculo cantidad de días intermedios
    $diallegada = $fechallegada->format("z");
    $diapartida = $fechapartida->format("z");
    $diferencia = $diapartida-$diallegada;
    // Chequeo disponibilidad de los días intermedios
    for ($i=1; $i < $diferencia; $i++) {
      // Obtengo los datos para cada día y devuelvo la fecha a la original después de modificarla
      $diaEnEspanol = $this->diaEnEspanol($fechallegada->modify('+' . $i . ' day'));
      $fechallegada->modify('-' . $i . ' day');
      $dia = $diasYHorarios->where('dia',$diaEnEspanol)->first();
      // Verifico si está disponible el día entero
      $disponibleDiaEntero = ($dia->horaComienzo == 0 && $dia->horaFin == 1439);
      if (!$disponibleDiaEntero) {
        // Si no lo está interrumpo el for y paso directo a validar
        break;
      }
    }
    // Si todas las variables dan true, retorno true
    if ($disponibleLlegada && $disponiblePartida && $disponibleHastaFinalDiaLlegada && $disponibleDesdeComienzoDiaPartida && $disponibleDiaEntero) {
      return true;
    }
  }
    // Si no se cumple ninguna condición, devuelvo falso (no disponible)
    return false;
  }

  // Función para verificar si no se pisa con otro alquiler existente en ese horario
  public function disponibleAlquileres(DateTime $fechallegada, DateTime $fechapartida){

    // Busco si hay otros alquileres al principio (con fecha de salida entre mis fechas de estadía)
    $alquileres = Alquiler::where('idEspacio', $this->id)
      ->where('fechaFinAlquiler','>=', $fechallegada)
      ->where('fechaFinAlquiler','<=', $fechapartida)
      ->count();
    if ($alquileres > 0) {
      return false;
    }

    // Busco si hay otros alquileres al final (con fecha llegada entre mis fechas de estadía)
    $alquileres = Alquiler::where('idEspacio', $this->id)
      ->where('fechaComienzoAlquiler','>=', $fechallegada)
      ->where('fechaComienzoAlquiler','<=', $fechapartida)
      ->count();

    if ($alquileres > 0) {
      return false;
    }

    // Busco si hay otros alquileres con estadías que engloben la mía
    $alquileres = Alquiler::where('idEspacio', $this->id)
      ->where('fechaComienzoAlquiler','<=', $fechallegada)
      ->where('fechaFinAlquiler','>=', $fechapartida)
      ->count();

    if ($alquileres > 0) {
      return false;
    }
    // Si no se da ninguno de estos casos, devuelvo verdadero (disponible)
    return true;
  }

  // Función para chequear que se acepte el tipo de vehiculo solicitado
  public function disponibleVehiculo($tipoVehiculo){

    if ($tipoVehiculo == 'Automóvil') {
      if ($this->cantAutos > 0) {
        return true;
      } else {
        return false;
      }
    }

    if ($tipoVehiculo == 'Motocicleta') {
      if ($this->cantMotos > 0) {
        return true;
      } else {
        return false;
      }
    }

    if ($tipoVehiculo == 'Bicicleta') {
      if ($this->cantBicicletas > 0) {
        return true;
      } else {
        return false;
      }
    }

  }

  // Función para chequear que todo esté disponible simultáneamente
  public function disponibleTodo(DateTime $fechallegada, DateTime $fechapartida, $tipoVehiculo){

    $disponibleTodo = true;

    // Si alguno no está disponible, el resultado final es falso
    if (!$this->disponibleMinYMax($fechallegada, $fechapartida) || !$this->disponibleDiasYHorarios($fechallegada, $fechapartida) || !$this->disponibleAlquileres($fechallegada, $fechapartida) || !$this->disponibleVehiculo($tipoVehiculo)) {
      $disponibleTodo = false;
    }

    // Esto queda para más adelante si quiero hacer una API / Ajax Call
    $disponible = [
      'disponibleTodo' => $disponibleTodo,
      'detalle' => [
        'minYMax' => $this->disponibleMinYMax($fechallegada, $fechapartida),
        'diasYHorarios' => $this->disponibleDiasYHorarios($fechallegada, $fechapartida),
        'alquileres' => $this->disponibleAlquileres($fechallegada, $fechapartida),
        'vehiculo' => $this->disponibleVehiculo($tipoVehiculo),
      ]
    ];

    return $disponible;
  }

}
