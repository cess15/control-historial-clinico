@extends('layouts.app')
@if(Auth::user()->role_id==2)
@section('title', 'Medico')
@endif
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Historial de pacientes</h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="ml-2">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="text" placeholder="Buscar" aria-label="Search"
                    autofocus id="search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach($pacientes as $paciente)
                <div class="info-column col-12 col-sm-6 col-md-4 align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            {{ $paciente->ocupacion }}
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead">
                                        <b><span
                                                class="info-title">{{ $paciente->user->nombres.' '.$paciente->user->apellidos}}</span></b>
                                    </h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small">
                                            <span class="fa-li">
                                                <i class="fas fa-lg fa-building"></i>
                                            </span> Dirección: {{ $paciente->direccion }}, {{ $paciente->ciudad }}
                                        </li>
                                        <li class="small">
                                            <span class="fa-li">
                                                <i class="fas fa-lg fa-phone"></i>
                                            </span> Télefono : {{ $paciente->user->telefono }}
                                        </li>
                                        <li class="small">
                                            <span class="fa-li"><i class="fas fa-lg fa-vial"></i></span>
                                            Tipo de sangre: {{ $paciente->tipo_sangre}}
                                        </li>
                                        <li class="small">
                                            <span class="fa-li"><i class="fas fa-lg fa-blind"></i></span>
                                            Discapacidad: {{ $paciente->discapacidad!=false ? 'Si' :'No' }}
                                        </li>
                                        <li class="small">
                                            <span class="fa-li"><i class="fas fa-lg fa-user-circle"></i></span>
                                            Edad: <span class="info-edad">{{ $paciente->fecha_nacimiento }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{ $paciente->user->url_imagen_perfil }}" alt="img_paciente"
                                        class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="{{ route('historial.show',$paciente->historial->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-hospital-user"></i> Ver historial
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <div class="pagination justify-content-center m-0">{{ $pacientes->links() }}</div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('/assets/js/consultation.js') }}"></script>
<script src="{{ asset('/assets/js/getAge.js') }}"></script>
@endpush