<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckEspacioOwner
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
        $espacio = $request->route('espacio');

        if ($espacio) {
          if (Auth::user()->id != $espacio->idUser) {
            return redirect()->route('home');
          }
        }
        return $next($request);
    }
}
