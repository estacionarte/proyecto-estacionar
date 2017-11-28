<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiasYHorariosDeEspacio extends Model
{
  use SoftDeletes;

  protected $table = 'diasyhorarios_espacios';

  protected $fillable = [
    'idEspacio',
    'dia',
    'horaComienzo',
    'horaFin'
  ];

  public function espacio()
    {
        return $this->belongsTo(App\Espacio::class, 'idEspacio');
    }

}
