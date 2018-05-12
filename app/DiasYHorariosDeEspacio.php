<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiasYHorariosDeEspacio extends Model
{

  protected $table = 'espacios_diasyhorarios';

  protected $fillable = [
    'idEspacio',
    'dia',
    'horaComienzo',
    'horaFin'
  ];

  public function espacio()
    {
        return $this->belongsTo(Espacio::class, 'idEspacio');
    }

}
