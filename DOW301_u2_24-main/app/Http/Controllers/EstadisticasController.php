<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Estadisticas;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function index()
    {
        // Obtener todos los partidos
        $partidos = Partido::all();
        return view('estadisticas.index', compact('partidos'));
    }

    public function create($partido_id)
    {
        return view('estadisticas.create', compact('partido_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'partido_id' => 'required|exists:partidos,id',
            'puntos_local' => 'required|integer|min:0',
            'puntos_visitante' => 'required|integer|min:0',
            // Agrega validaciones para otros campos según sea necesario
        ]);

        Estadisticas::create($request->all());

        return redirect()->route('estadisticas.index')
            ->with('success', 'Estadísticas de partido creadas correctamente');
    }

    // Resto de los métodos...
}
