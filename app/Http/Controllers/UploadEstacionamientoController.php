<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadEstacionamientoController extends Controller
{

  public function showUploadEstacionamiento1(){
    return view('upload-estacionamiento.1infogeneral');
  }

  public function showUploadEstacionamiento2(){
    return view('upload-estacionamiento.2estadias');
  }

}
