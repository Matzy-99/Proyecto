<!-- resources/views/estadisticas/index.blade.php -->

@extends('layouts.master')

@section('contenido-principal')
<div class="container">
    <h1>Lista de Partidos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Equipo Local</th>
                <th>Equipo Visitante</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partidos as $partido)
            <tr>
                <td>{{ $partido->id }}</td>
                <td>{{ $partido->equipo_local }}</td>
                <td>{{ $partido->equipo_visitante }}</td>
                <td>{{ $partido->fecha }}</td>
                <td>
                    <a href="{{ route('estadisticas.create', $partido->id) }}" class="btn btn-primary">Agregar Estadísticas</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
