@extends('layouts.master')

@section('contenido-principal')
    <div class="container">
        <h2>Partidos Creados</h2>

        @if ($partidos->isEmpty())
            <p>No hay partidos registrados.</p>
        @else
            <ul>
                @foreach ($partidos as $partido)
                    <li>
                        {{ $partido->equipoA->nombre }} vs {{ $partido->equipoB->nombre }} 
                        ({{ $partido->resultado_a }} - {{ $partido->resultado_b }}), 
                        Fecha: {{ $partido->fecha }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
