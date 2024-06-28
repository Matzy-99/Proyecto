@extends('layouts.master')

@section('css')
    <link href="{{ asset('css/fondo.css') }}" rel="stylesheet">
@endsection

@section('contenido-principal')
    <!-- datos -->
    <div class="mt-5 container-fluid" style="background-color: #dacfc6; border: 2px solid #000; padding: 20px;"> <!-- Fondo gris claro -->
        <div class="row">
            <div class="col">
                <h3 class="mt-3 mb-4">Jugadores</h3>
            </div>
        </div>

        <div class="row">
            <!-- tabla -->
            <div class="col-12 col-lg-8 order-last order-lg-first">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>N°</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Posición</th>
                            <th>Número</th>
                            <th>Equipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jugadores as $num=>$jugador)
                        <tr>
                            <td class="align-middle">{{$num+1}}</td>
                            <td class="align-middle">{{$jugador->apellido}}</td>
                            <td class="align-middle">{{$jugador->nombre}}</td>
                            <td class="align-middle">{{$jugador->posicion}}</td>
                            <td class="align-middle">{{$jugador->numero}}</td>
                            <td class="align-middle">
                                {{$jugador->equipo != null ? $jugador->equipo->nombre : 'Sin equipo'}}
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-danger pb-0" data-bs-toggle="tooltip" data-bs-title="Borrar {{$jugador->nombre}}">
                                    <span class="material-icons">delete</span>
                                </a>
                                <a href="#" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip" data-bs-title="Editar Jugador">
                                    <span class="material-icons">edit</span>
                                </a>
                                <a href="#" class="btn btn-sm btn-info pb-0 text-white" data-bs-toggle="tooltip" data-bs-title="Ver Jugador">
                                    <span class="material-icons">group</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- form agregar jugador -->
            <div class="mb-4 col-12 col-lg-4 order-first order-lg-last ">
                <div class="card">
                    <div class="card-header bg-dark text-white">Agregar Jugador</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('jugadores.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" id="apellido" name="apellido" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="posicion">Posición:</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="pos-base" name="posicion" value="Base">
                                        <label for="pos-base" class="form-check-label">Base</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="pos-escolta" name="posicion" value="Escolta">
                                        <label for="pos-escolta" class="form-check-label">Escolta</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="pos-alero" name="posicion" value="Alero">
                                        <label for="pos-alero" class="form-check-label">Alero</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="pos-ala-pivot" name="posicion" value="Ala-Pivot">
                                        <label for="pos-ala-pivot" class="form-check-label">Ala-Pivot</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" id="pos-pivot" name="posicion" value="Pivot">
                                        <label for="pos-pivot" class="form-check-label">Pivot</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="numero">Número Camiseta:</label>
                                <input class="form-control" type="number" name="numero" id="numero" min="1" max="99">
                            </div>
                            <div class="form-group">
                                <label for="equipo">Equipo</label>
                                <select class="form-control" name="equipo" id="equipo">
                                    @foreach ($equipos as $equipo)
                                        <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-4 mb-3 d-grid gap-2 d-lg-block">
                                <button type="reset" class="btn btn-warning">Cancelar</button>
                                <button type="submit" class="btn btn-success">Agregar Jugador</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
