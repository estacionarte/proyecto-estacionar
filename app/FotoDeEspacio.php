<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FotoDeEspacio extends Model
{
  use SoftDeletes;

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