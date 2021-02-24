@extends('layouts.app')
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Agendar cita</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <ol class="breadcrumb float-sm-left ml-2">
                    <li class="breadcrumb-item active">Especialidad</li>
                    <li class="breadcrumb-item">Doctor</li>
                    <li class="breadcrumb-item">Terminar</li>
                  </ol>
            </div>
            <div class="row mb-3">
                <!-- SEARCH FORM -->
                <div class="ml-2">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="text" placeholder="Buscar"
                            aria-label="Search" autofocus id="search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('msg'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>Excelente</h5>
                <ul>
                    <li>{{ session("msg") }}</li>
                </ul>
            </div>
            @endif
            <div class="row">
                @foreach($especialidades as $especialidad)
                <div class="info-column col-md-3 col-sm-6 col-12">
                    <a href="{{ route('citas.info',$especialidad->id) }}" class="text-dark">
                        <div class="info-box">
                            @if($especialidad->id==1)
                            <span class="info-box-icon">
                                <i class="fa fa-stethoscope"></i></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==2)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/gerontologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==3)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/odontologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==4)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/urologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==5)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/ginecologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==6)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/traumatologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==7)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/optometria.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==8)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/psicologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==9)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/terapia_de_lenguaje.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==10)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/terapia_respiratoria.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                            @if($especialidad->id==11)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/terapia_fisica.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                <p class="info-title">{{ $especialidad->name}}</p>
                            </div>
                            @endif
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('/assets/js/consultation.js') }}"></script>
@endpush