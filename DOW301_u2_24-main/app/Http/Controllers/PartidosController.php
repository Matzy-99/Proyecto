<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Equipo;

class PartidosController extends Controller
{
    public function index()
    {
        $partidos = Partido::orderBy('fecha', 'desc')->get();
        return view('partidos.mostrar', compact('partidos'));
    }

    public function mostrarRecientes()
    {
        $equipos = Equipo::all();
        $partidosRecientes = Partido::with(['equipoA', 'equipoB'])
                                    ->orderBy('fecha', 'desc')
                                    ->take(10)
                                    ->get();
        
        return view('partidos.recientes', compact('equipos', 'partidosRecientes'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        return view('partidos.crear', compact('equipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipo_a' => 'required|different:equipo_b|exists:equipos,id',
            'equipo_b' => 'required|exists:equipos,id',
            'resultado_a' => 'required|integer|min:0', 
            'resultado_b' => 'required|integer|min:0', 
            'fecha' => 'required|date',
            'estadisticas' => 'nullable|string',
        ]);

        $partido = new Partido();
        $partido->equipo_a_id = $request->equipo_a;
        $partido->equipo_b_id = $request->equipo_b;
        $partido->resultado_a = $request->resultado_a;
        $partido->resultado_b = $request->resultado_b;
        $partido->fecha = $request->fecha;
        $partido->estadisticas = $request->estadisticas;
        $partido->save();

        return redirect()->route('partidos.index')->with('success', 'Partido creado correctamente');
    }

    public function show(Partido $partido)
    {
        return view('partidos.mostrar', compact('partido'));
    }

    public function edit(Partido $partido)
    {
        $equipos = Equipo::all();
        return view('partidos.editar', compact('partido', 'equipos'));
    }

    public function update(Request $request, Partido $partido)
    {
        $request->validate([
            'equipo_a' => 'required|different:equipo_b|exists:equipos,id',
            'equipo_b' => 'required|exists:equipos,id',
            'resultado_a' => 'required|integer|min:0', 
            'resultado_b' => 'required|integer|min:0', 
            'fecha' => 'required|date',
            'estadisticas' => 'nullable|string',
        ]);

        $partido->equipo_a_id = $request->equipo_a;
        $partido->equipo_b_id = $request->equipo_b;
        $partido->resultado_a = $request->resultado_a;
        $partido->resultado_b = $request->resultado_b;
        $partido->fecha = $request->fecha;
        $partido->estadisticas = $request->estadisticas;
        $partido->save();

        return redirect()->route('partidos.index')->with('success', 'Partido actualizado correctamente');
    }

    public function destroy(Partido $partido)
    {
        $partido->delete();
        return redirect()->route('partidos.index')->with('success', 'Partido eliminado correctamente');
    }
}
    