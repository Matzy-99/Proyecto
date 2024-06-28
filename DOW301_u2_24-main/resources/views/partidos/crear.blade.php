@extends('layouts.master')

@section('contenido-principal')
<form method="POST" action="{{ route('partidos.store') }}">
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
