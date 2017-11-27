<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Espacio extends Model
{
  use SoftDeletes;

  protected $table = 'espacios';

  protected $fillable = [
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
    'infoprivada'
  ];

}
