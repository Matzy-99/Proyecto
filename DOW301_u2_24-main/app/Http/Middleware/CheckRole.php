<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if (in_array($user->rol_id, $roles)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'No tienes permisos para acceder a esta página.');
    }
}
