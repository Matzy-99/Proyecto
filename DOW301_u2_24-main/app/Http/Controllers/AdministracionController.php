<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministracionController extends Controller
{
    /**
     * Mostrar el panel de administración.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Verificar si el usuario autenticado tiene el rol de 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            // Retornar la vista del panel de administración
            return view('administracion.index');
        }

        // Si el usuario no tiene el rol adecuado, redirigir o lanzar una excepción
        return redirect('/')->with('error', 'No tienes permiso para acceder a esta página');
    }
}
