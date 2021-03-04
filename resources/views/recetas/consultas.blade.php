@extends('layouts.app')
@if(Auth::user()->role_id==5)
@section('title', 'Cajero')
@endif
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Consultar receta</h1>
        </div>
        <div class="card-body pb-0">
            <div class="row ">
                <ol class="breadcrumb float-sm-left ml-2">
                    <li class="breadcrumb-item"><a href="{{ route('recetas.index') }}">Especialidad</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('recetas.showViewEspecialidad',$medico->especialidad->id) }}">Doctor</a></li>
                    <li class="breadcrumb-item active">Consultas</li>
                    <li class="breadcrumb-item">Recetas</li>
                </ol>
            </div>
            <div class="row mb-3">
                <!-- SEARCH FORM -->
                <div class="ml-2">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="text" placeholder="Buscar por fecha"
                            aria-label="Search" autofocus id="search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-stretch">
                @foreach($consultas as $consulta)
                <div class="info-column col-12 col-sm-6 col-md-4 align-items-stretch">
                    <a href="{{ route('recetas.getConsulta',$consulta->id) }}" class="text-dark">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                {{ $consulta->historial->paciente->ocupacion }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead">
                                            <b class="info-title">{{ $consulta->historial->paciente->user->nombres.' '.$consulta->historial->paciente->user->apellidos}}</b>
                                        </h2>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-building"></i></span> Dirección:
                                                {{ $consulta->historial->paciente->direccion }},
                                                {{ $consulta->historial->paciente->ciudad }}</li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-phone"></i></span>
                                                Télefono : {{ $consulta->historial->paciente->user->telefono }}</li>
                                            <li class="small"><span class="fa-li"><i
                                                        class="fas fa-lg fa-calendar-alt"></i></span> Fecha: <span
                                                    class="info-date-tz">{{ $consulta->created_at }}</span></li>

                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="{{ $consulta->historial->paciente->user->url_imagen_perfil }}"
                                            alt="img_paciente" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <span
                                    class="btn btn-danger">{{ $consulta->atendida!=false ? 'En proceso' : 'Atendida' }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <div class="pagination justify-content-center m-0">{{ $consultas->links() }}</div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('/assets/js/consultation.js') }}"></script>
<script src="{{ asset('/assets/js/convertDate.js') }}"></script>
@endpush