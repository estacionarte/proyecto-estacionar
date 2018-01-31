<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\mail\EmailContact;

class ContactController extends Controller
{
    public function sendContact(Request $request)
    {
      Mail::to('proyectoestacionar@gmail.com')->send(new EmailContact($request));
      return redirect()->route('coming.soon');
    }
}
