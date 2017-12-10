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
      'IdUser'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

  }
