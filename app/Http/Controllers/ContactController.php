<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\mail\EmailContact;

class ContactController extends Controller
{
    public function sendContact(Request $request)
    {
      Mail::to('marianoalvareztt@gmail.com')->send(new EmailContact($request));
      // dd('ok');
      return redirect()->to('/lanzamiento');
    }
}