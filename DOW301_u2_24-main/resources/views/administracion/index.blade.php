@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1>Panel de Administración</h1>
            <div class="list-group mt-4">
                <a href="{{ route('usuarios.index') }}" class="list-group-item list-group-item-action">
                    <i class="material-icons">Usuario</i> Configuración de Usuarios
                </a>
                <a href="{{ route('usuarios.create') }}" class="list-group-item list-group-item-action">
                    <i class="material-icons">Crear Usuarios</i> Crear Nuevo Usuario
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
