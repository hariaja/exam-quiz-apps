<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, ...$roles): Response
  {
    if (me() && me()->hasAnyRole($roles)) {
      return $next($request);
    }

    abort(403, 'USER DOES NOT HAVE THE RIGHT ROLES.');
  }
}
