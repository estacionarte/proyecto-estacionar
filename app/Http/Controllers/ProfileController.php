<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Espacio;
use App\FotoDeEspacio;
use DB;
use Auth;
use Image;

class ProfileController extends Controller
{
  public function mostrarPerfil(Espacio $espacio){

    $espacios = DB::table('espacios')
    ->select('*')
    ->where('idUser', '=', Auth::user()->id)
    ->get();

    return view('profile', compact('espacios'));
  }

  public function showUpdateProfileImage(){
    return view('update-profile-image');
  }

  public function updateProfileImage(Request $request){
    if ($request->hasFile('avatar')) {
      $avatar = $request->file('avatar');
      $filename = time() . '_' . $avatar->getClientoriginalExtension();
      Image::make($avatar)->resize(240,240)->save(public_path('/storage/profilePic' . $filename));

      $user = Auth::user();
      $user->avatar = $filename;
      $user->save();
    }
    return view('/home');
  }

}
