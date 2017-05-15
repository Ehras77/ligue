<?php

namespace App\Http\Middleware;

use Closure;

class CheckTeamAdmin
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
      dd($request);
        if (Auth::check())
        {
          $user = Auth::getUser();

        }
        return $next($request);
    }
}
