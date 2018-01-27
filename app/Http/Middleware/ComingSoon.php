<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Route;
use Request;


class ComingSoon
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private $exceptRoutes = ['/lanzamiento','/signin'];

    public function handle($request, Closure $next)
    {
      // $route = Request::capture()->getRequestUri();
      //
      // if(!in_array($route, $this->exceptRoutes)) {
      //     if (!Auth::check() or Auth::user()->email !== 'joaquin@test.com') {
      //       return redirect('lanzamiento');
      //     }
      // }

      // foreach ($this->rutasExentas as $ruta) {
      //   if ($request->is($ruta)) {
      //     return $next($request);
      //   }
      //   else {
      //     return redirect('/');
      //   }
      // }

      if (!Auth::check()) {
        return redirect()->route('coming.soon');
      }
      if (Auth::user()->email != 'joaquin@test.com') {
        return redirect()->route('coming.soon');
      }
      return $next($request);

  }
}
