<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsNullRoles
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    // Check if user Dont have roles
    if (Auth::check() && me()->roles->isEmpty()) {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect(route('login'))->with('error', trans('alert.is_null_roles'));
    } else {
      return $next($request);
    }
  }
}
