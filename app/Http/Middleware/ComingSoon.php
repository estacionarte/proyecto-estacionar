<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Route;


class ComingSoon
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
      // if (!Auth::check()) {
      //   return redirect()->route('coming.soon');
      // }
      // if (Auth::user()->email != 'joaquin@test.com' && Auth::user()->email != 'mariano@estacionados.com' && Auth::user()->email != 'test@test.com') {
      //   return redirect()->route('coming.soon');
      // }
      return $next($request);

  }
}
