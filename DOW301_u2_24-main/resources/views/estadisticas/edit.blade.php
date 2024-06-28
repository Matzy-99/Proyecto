@extends('layouts.master')

@section('contenido-principal')
    <div class="container">
        <h1>Crear Nueva Estadística</h1>

        <form action="{{ route('estadisticas.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="partido_id">Partido ID:</label>
                <input type="text" class="form-control" id="partido_id" name="partido_id" required>
            </div>

            <div class="form-group">
                <label for="puntos_local">Puntos Local:</label>
                <input type="number" class="form-control" id="puntos_local" name="puntos_local" required>
            </div>

            <div class="form-group">
                <label for="puntos_visitante">Puntos Visitante:</label>
                <input type="number" class="form-control" id="puntos_visitante" name="puntos_visitante" required>
            </div>

            <!-- Agrega más campos según tus necesidades -->

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
