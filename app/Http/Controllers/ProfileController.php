<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
  public function mostrarPerfil(){
    return view('profile');
  }
}
