@extends('layouts.master')

@section('css')
    <link href="{{ asset('css/fondoinicio.css') }}" rel="stylesheet">
@endsection

@section('contenido-principal')
<!-- contenido principal -->
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col text-white">
            <h4>Sistema de Campeonato de Basquetbol</h4>
        </div>
    </div>

    <div class="row">
        <!-- equipos -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/inicio1.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">Equipos</h5>
                    <div class="btn-group d-flex">
                        <button class="btn btn-outline-success">Ver</button>
                        <button class="btn btn-outline-success">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- estadios -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/inicio2.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">Estadios</h5>
                    <div class="btn-group d-flex">
                        <button class="btn btn-outline-success">Ver</button>
                        <button class="btn btn-outline-success">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- estadisticas -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/inicio3.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">Estadísticas</h5>
                    <div class="btn-group d-flex">
                        <button class="btn btn-outline-success">Ver</button>
                        <button class="btn btn-outline-success">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- jugadores -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/inicio4.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">Jugadores</h5>
                    <div class="btn-group d-flex">
                        <button class="btn btn-outline-success">Ver</button>
                        <button class="btn btn-outline-success">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partidos -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/inicio5.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">Partidos</h5>
                    <div class="btn-group d-flex">
                        <button class="btn btn-outline-success">Ver</button>
                        <button class="btn btn-outline-success">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- config -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/inicio 5.jpg') }}">
                <div class="card-body">
                    <h5 class="card-title">Configuración</h5>
                    <div class="btn-group d-flex">
                        <button class="btn btn-outline-success">Ver</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    
