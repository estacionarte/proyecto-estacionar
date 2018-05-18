<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailContact;
use DB;

class ContactController extends Controller
{
    // public function sendContact(Request $request)
    // {
    //   Mail::to('admin@estacionados.com')->send(new EmailContact($request));
    //   return redirect()->route('coming.soon');
    // }

    public function suscribe(Request $request)
    {
      $this->validate(
        $request,
        [
          'name' => 'required|string|max:32',
          'email' => 'required|unique:comingsoon,email'
      ]);

      DB::insert('insert into comingsoon (name, email, created_at, updated_at) values (?, ?, ?, ?)', [$request->input('name'), $request->input('email'), now(), now()]);

      $registrado = 1;

      // ENVÍO DE EMAIL MEDIANTE EL FORM
      $data = array(
        'name' => $request->input('name'),
        'email' => $request->input('email'),
      );

      Mail::send('emails.comming-soon', $data, function($message){
        $message->to('info@estacionados.com')->subject('LANDING-Suscripción');
        $message->from('no-reply@estacionados.com', 'LandingPage');
      });

      return view('coming-soon', compact('registrado'));
    }

    public function seranfitrion(Request $request)
    {
      $this->validate(
        $request,
        [
          'name' => 'required|string|max:32',
          'email' => 'required|string|unique:comingsoon,email',
          'location' => 'required|string|max:100',
          'informacion' => 'required|string|max:250',
        ],
        [
          'email.unique'  => 'Este e-mail ya fue ingresado.',
      ]);

      DB::insert('insert into comingsoon (name, email, location, informacion, created_at, updated_at) values (?, ?, ?, ?, ?, ?)', [$request->input('name'), $request->input('email'), $request->input('location'), $request->input('informacion'), now(), now()]);

      $registrado = 1;

      return view('anfitrion', compact('registrado'));
    }
}
