<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EsAdministrador
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol_id === 'admin') {
            return $next($request);
        }

        return redirect('/')->with('error', 'No tienes permisos para acceder a esta página.');
    }
}
