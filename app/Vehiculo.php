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
      'IdUser',
    ];
}
