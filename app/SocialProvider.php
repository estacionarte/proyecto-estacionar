<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SocialProvider extends Model
{

    protected $table = 'social_providers';

    protected $fillable = [
      'provider_id',
      'provider'
    ];

    public function user()
    {
      return $this->belongsTo(User::class, 'idUser');
    }
}
