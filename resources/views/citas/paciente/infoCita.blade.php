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
                    <li class="breadcrumb-item"><a href="{{ route('citas.reservar') }}">Especialidad</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('citas.info',$medico->especialidad->id) }}">Doctor</a>
                    </li>
                    <li class="breadcrumb-item active">Terminar</li>
                </ol>
            </div>
            <div class="row mb-3">
                <!-- SEARCH FORM -->
                <div class="ml-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ route('citas.info',$medico->especialidad->id) }}">
                                <button class="btn btn-navbar" type="button">
                                    <i class="fas fa-arrow-alt-circle-left"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <img src="{{ $medico->user->url_imagen_perfil }}" class="img-circle img-sm" width="50px" height="50px"
                    alt="foto_perfil">
                <div class="ml-2">
                    <span>Dr. {{$medico->user->apellidos}}
                        {{$medico->user->nombres}}
                    </span>
                </div>
            </div>
            <div class="ml-3">
                <div class="row">
                    <span>Especialidad: {{ $medico->especialidad->name }}</span>
                </div>
                <div class="row">
                    <span>Correo: {{ $medico->user->email }}</span>
                </div>
                <div class="row">
                    <span>Telefono: {{ $medico->user->telefono }}</span>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-info"></i>Horario de atención: </h5>
                        <ul>
                            @foreach($citas as $cita)
                            <li class="mt-1"><span class="ml-1 info-date">{{ $cita->dia }}</span><span> a las
                                    {{ $cita->hora }} - $
                                    {{$cita->precio}}.</span></li>
                            @endforeach
                        </ul>
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
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>Error</h5>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {!! Form::open(['route'=> ['citasReservadas.store'], 'method'=>'POST']) !!}
            {!! Form::token() !!}
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('horario', 'Horario(*)') }}
                        <select id="horario" class="form-control" name="horario">
                            <option value="0" selected="selected" disabled="disabled">--Seleccione--</option>
                            @foreach($citas as $cita)
                            <option value="{{$cita->id}}" class="info-date">{{$cita->dia}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('descripcion', 'Descripción') !!}
                        {!! Form::textarea('descripcion', null,
                        ['placeholder'=>'Escriba...','rows'=>'3','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ route('citas.info',$medico->especialidad->id) }}"><button type="button"
                            class="btn btn-primary float-left">Atrás</button></a>
                    <button type="submit" class="btn btn-primary float-right">Confirmar y agendar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('/assets/js/convertDate.js') }}"></script>
@endpush