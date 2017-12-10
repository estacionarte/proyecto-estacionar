<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;

class LocationsController extends Controller
{
    public function map(Request $request){

      if ($request->isMethod('post')) {

        $lat         = $request->input('lat');
        $lng         = $request->input('lng');
        $location    = $lat . ', ' . $lng;
        $address     = $request->input('name');
        $maxDistance = $request->input('maxDistance');

        // $locations = Location::all();
        // $locations = Location::distance(700,'-34.6033, -58.3816')
        $locations = Location::distance($maxDistance, $location)
                      //  ->withDistance('-34.6033, -58.3816')
                       ->withDistance($location)
                   //  ->withDistance($data['latitude'] . ',' . $data['longitude'])
                       ->orderBy('distance')
                       ->get();

        return \Response::json($locations);

      } else {
        $locations = [];
      }

      return view('locations')->with(['locations'=>$locations]);
    }


}
