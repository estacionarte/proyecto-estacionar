<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alquiler extends Model
{
    use SoftDeletes;

    protected $table = 'alquileres';

    protected $fillable = [
      'idEspacio',
      'idVehiculo',
      'fechaComienzoAlquiler',
      'fechaFinAlquiler',
      'precioFinal',
      'rating',
      'comentario',
    ];
}
