@extends('layouts.master')

@section('contenido-principal')
    <h1>Partidos Recientes</h1>

    <!-- Formulario para crear nuevos partidos -->
    <div class="card mb-3">
        <div class="card-header">
            Nuevo Partido
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('partidos.guardar') }}">
                @csrf
                <div class="form-group">
                    <label for="equipo_a">Equipo A:</label>
                    <select class="form-control" id="equipo_a" name="equipo_a">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="equipo_b">Equipo B:</label>
                    <select class="form-control" id="equipo_b" name="equipo_b">
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="resultado_a">Resultado Equipo A:</label>
                    <input type="number" class="form-control" id="resultado_a" name="resultado_a" required>
                </div>

                <div class="form-group">
                    <label for="resultado_b">Resultado Equipo B:</label>
                    <input type="number" class="form-control" id="resultado_b" name="resultado_b" required>
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>

                <div class="form-group">
                    <label for="estadisticas">Estadísticas:</label>
                    <textarea class="form-control" id="estadisticas" name="estadisticas"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Partido</button>
            </form>
        </div>
    </div>

    

    <table class="table">
        <thead>
            <tr>
                <th>Equipo A</th>
                <th>Equipo B</th>
                <th>Resultado</th>
                <th>Fecha</th>
                <th>Estadísticas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partidosRecientes as $partido)
                <tr>
                    <td>{{ $partido->equipoA->nombre }}</td>
                    <td>{{ $partido->equipoB->nombre }}</td>
                    <td>{{ $partido->resultado_a }} - {{ $partido->resultado_b }}</td>
                    <td>{{ $partido->fecha }}</td>
                    <td>{{ $partido->estadisticas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection