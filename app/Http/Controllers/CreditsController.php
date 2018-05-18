<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CreditsController extends Controller
{
    public function mostrarCreditsForm(){
      return view('credits');
    }

    public function enviarCredits(Request $request){
      // $this->validate(
      //   $request,
      //   [
      //     'name' => 'required|string|max:32',
      //     'email' => 'required|email|unique:creditos,email'
      // ]);

      //ENVÍO DE EMAIL MEDIANTE EL FORM
      // $data = array(
      //   'name' => $request->input('name'),
      //   'email' => $request->input('email'),
      // );
      //
      // Mail::send('emails.credits', $data, function($message){
      //   $message->to('proyectoestacionar@gmail.com')->subject('Cupón de descuento Estacionados');
      //   $message->from('no-reply@estacionados.com', 'Cupón de descuento - Estacionados');
      // });

      return view('credits');
    }
}
