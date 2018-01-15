<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Espacio extends Model
{
  use SoftDeletes;

  protected $table = 'espacios';

  protected $fillable = [
    'idUser',
    'direccion',
    'dpto',
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

  public function comienzo($dia){
    $dias = $this->diasyhorarios()->where('dia',$dia)->first();
    return $this->minutosEnHoraDelDia($dias->horaComienzo);
  }

  public function fin($dia){
    $dias = $this->diasyhorarios()->where('dia',$dia)->first();
    return $this->minutosEnHoraDelDia($dias->horaFin);
  }

  public function getDescuento($hora){
    $descuento = $this->descuentos()->where('hora',$hora)->first();
    return $descuento->descuento;
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

  public function precio($minutoComienzo, $minutoFin){
    $cantidadMinutosAlquiler = $minutoFin - $minutoComienzo;
    $precioSinDescuentos = round($cantidadMinutosAlquiler * $this->precioAutosMinuto);

    return $precioSinDescuentos;
  }

  public function descuento($minutoComienzo, $minutoFin){
    $cantidadMinutosAlquiler = $minutoFin - $minutoComienzo;
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

  public function precioFinal($minutoComienzo, $minutoFin){
    $cantidadMinutosAlquiler = $minutoFin - $minutoComienzo;
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

  public function disponible(){

  }


}
