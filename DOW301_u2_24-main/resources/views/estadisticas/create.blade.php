<!-- resources/views/estadisticas/create.blade.php -->

@extends('layouts.master')

@section('contenido-principal')
<div class="container">
    <h1>Agregar Estadísticas</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('estadisticas.store') }}">
        @csrf

        <input type="hidden" name="partido_id" value="{{ $partido_id }}">

        <div class="form-group">
            <label for="puntos_local">Puntos Local</label>
            <input type="number" class="form-control" id="puntos_local" name="puntos_local" required>
        </div>

        <div class="form-group">
            <label for="puntos_visitante">Puntos Visitante</label>
            <input type="number" class="form-control" id="puntos_visitante" name="puntos_visitante" required>
        </div>

        <!-- Agrega aquí los demás campos de estadísticas -->
        <div class="form-group">
            <label for="rebotes_local">Rebotes Local</label>
            <input type="number" class="form-control" id="rebotes_local" name="rebotes_local" required>
        </div>

        <div class="form-group">
            <label for="rebotes_visitante">Rebotes Visitante</label>
            <input type="number" class="form-control" id="rebotes_visitante" name="rebotes_visitante" required>
        </div>

        <!-- Repite el formato para los demás campos... -->

        <button type="submit" class="btn btn-success">Guardar Estadísticas</button>
    </form>
</div>
@endsection
