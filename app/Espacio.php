<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Espacio extends Model
{
  use SoftDeletes;

  protected $table = 'espacios';

  protected $geofields = array('location');

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
    'location',
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

  public function precioFinal($minutoComienzo, $minutoFin){
    $cantidadMinutosAlquiler = $minutoFin - $minutoComienzo;
    $precioSinDescuentos = $cantidadMinutosAlquiler * $this->precioAutosMinuto;
    if ($cantidadMinutosAlquiler>1440) {
      $precioFinal = (1 - $this->getDescuento(24)) * $precioSinDescuentos;
    } elseif ($cantidadMinutosAlquiler>360) {
      $precioFinal = (1 - $this->getDescuento(6)) * $precioSinDescuentos;
    } elseif ($cantidadMinutosAlquiler>60) {
      $precioFinal = (1 - $this->getDescuento(1)) * $precioSinDescuentos;
    } else {
      $precioFinal = $precioSinDescuentos;
    }
    return $precioFinal;
  }

  public static function setLocationAttribute($value) {
      // $this->attributes['location'] = DB::raw("POINT($value)");
      // $this->attributes['location'] = DB::raw("GeomFromText('POINT(".$value.")')");
  }

  public function getLocationAttribute($value){

      $loc =  substr($value, 6);
      $loc = preg_replace('/[ ,]+/', ',', $loc, 1);

      return substr($loc,0,-1);
  }

  public function newQuery($excludeDeleted = true)
  {
      $raw='';
      foreach($this->geofields as $column){
          $raw .= ' astext('.$column.') as '.$column.' ';
      }

      return parent::newQuery($excludeDeleted)->addSelect('*',DB::raw($raw));
  }

  public function scopeDistance($query,$dist,$location)
  {
    // return $query->whereRaw('st_distance(location,POINT('.$location.')) < '.$dist); // En grados

    //  Distancia en metros
    return $query->whereRaw('ST_Distance_Sphere(location,POINT(' . $location . ')) < ' . $dist);

  }

  public function scopeWithDistance($query, $location)
  {
    $distance = $query->selectRaw('Round(ST_Distance_Sphere(location,POINT(' . $location . '))) AS distance');

    return $distance;
  }


}
