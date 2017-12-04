<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;

class LocationsController extends Controller
{
    //

    public function map(){

      $locations = Location::all();
      // $locations = Location::distance(0.01,'-34.6033, -58.3816')->get();
      return view('locations')->with(['locations'=>$locations]);
    }


}
