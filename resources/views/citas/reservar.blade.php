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
            <div class="row mb-3">
                <!-- SEARCH FORM -->
                <div class="ml-2">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="text" placeholder="Buscar"
                        aria-label="Search" autofocus>
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($especialidades as $especialidad)
                <div class="col-md-3 col-sm-6 col-12">
                    <a href="{{ route('citas.info',$especialidad->id) }}" class="text-dark">
                        <div class="info-box">
                            @if($especialidad->id==1)
                            <span class="info-box-icon">
                                <i class="fa fa-stethoscope"></i></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==2)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/gerontologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==3)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/odontologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==4)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/urologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==5)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/ginecologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==6)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/traumatologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==7)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/optometria.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==8)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/psicologia.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==9)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/terapia_de_lenguaje.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==10)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/terapia_respiratoria.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
                            </div>
                            @endif
                            @if($especialidad->id==11)
                            <span class="info-box-icon"><img src="{{ asset('/assets/img/terapia_fisica.png') }}"
                                    width="40px"></span>
                            <div class="info-box-content">
                                {{ $especialidad->name}}
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