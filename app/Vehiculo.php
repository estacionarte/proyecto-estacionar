<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehiculo extends Model
{
  use SoftDeletes;

  protected $table = 'vehiculos';

  protected $fillable = [
    'tipoVehiculo',
    'marca',
    'modelo',
    'color',
    'patente',
    'deleted_at',
    'Iduser'
  ];

  public function usuario()
  {
      return $this->belongsTo(User::class, 'idUser');
  }

  public function datos(){
    if ($this->tipoVehiculo == 'Bicicleta') {
      $datos = $this->tipoVehiculo . ' ' . $this->color;
    } else {
      $datos = $this->tipoVehiculo . ' ' . $this->marca . ' ' . $this->modelo . ' ' . $this->color;
    }
    return $datos;
  }
}
