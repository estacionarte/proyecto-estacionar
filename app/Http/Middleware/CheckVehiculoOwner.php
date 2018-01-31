<?php

namespace App\Http\Middleware;

use Closure;
use App\Vehiculo;
use Auth;

class CheckVehiculoOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
     {

         $id = $request->route('id');
         $vehiculo = Vehiculo::find($id);

         if ($vehiculo) {
           if (Auth::user()->id != $vehiculo->idUser) {
             return redirect()->route('home');
           }
         }
         return $next($request);
     }
}
