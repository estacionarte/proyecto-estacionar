<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DescuentosDeEspacio extends Model
{
  use SoftDeletes;

  protected $table = 'espacios_descuentos';

  protected $fillable = [
    'idEspacio',
    'tipoVehiculo',
    'hora',
    'descuento'
  ];

  public function espacio()
    {
        return $this->belongsTo(App\Espacio::class, 'idEspacio');
    }
}
