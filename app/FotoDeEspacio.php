<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoDeEspacio extends Model
{

  protected $table = 'espacios_fotos';

  protected $fillable = [
    'idEspacio',
    'photoname',
  ];

  public function espacio()
    {
        return $this->belongsTo(App\Espacio::class, 'idEspacio');
    }
}
