@extends('layouts.app')
@if(Auth::user()->role_id==2)
@section('title', 'Medico')
@endif
@section('content')
<div class="container">
    <div class="card card-solid card-success">
        <div class="card-header">
            <div class="card-title">Paciente: {{ $citaReservada->paciente->user->nombres }}
                {{ $citaReservada->paciente->user->apellidos}}</div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ $citaReservada->paciente->user->url_imagen_perfil }}"
                                    alt="picture paciente">
                            </div>

                            <h3 class="profile-username text-center">{{ $citaReservada->paciente->user->nombres }}
                                {{ $citaReservada->paciente->user->apellidos}}</h3>

                            <p class="text-muted text-center">{{ $citaReservada->paciente->ocupacion }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tipo de sangre</b> <a class="float-right">{{ $citaReservada->paciente->tipo_sangre}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Discapacidad</b> <a class="float-right">{{ $citaReservada->paciente->discapacidad!=false ? 'Si' :'No' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Edad</b> <a class="float-right info-edad">{{ $citaReservada->paciente->fecha_nacimiento }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Estado Civil</b> <a class="float-right">{{ $citaReservada->paciente->estado_civil }}</a>
                                </li>
                            </ul>
                            <a href="{{ route('consultas.create',$citaReservada->id) }}" class="btn btn-primary btn-block"><b>Atender</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">Datos del paciente</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <div class="row">
                                        <div class="col">
                                            <p><b>Nombres: </b>{{ $citaReservada->paciente->user->nombres }}</p>
                                            <p><b>Apellidos: </b>{{ $citaReservada->paciente->user->apellidos }}</p>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col">
                                            <p><b>Fecha: </b><span class="info-date">{{ $citaReservada->cita->dia }}</span> a las {{ $citaReservada->cita->hora }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p><b>Cédula: </b>{{ $citaReservada->paciente->user->cedula }}</p>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col">
                                            <p><b>Correo electrónico: </b> {{ $citaReservada->paciente->user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p><b>Género: </b>{{ $citaReservada->paciente->user->genero }}</p>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col">
                                            <p><b>Télefono: </b> {{ $citaReservada->paciente->user->telefono }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p><b>Dirección: </b> {{ $citaReservada->paciente->direccion }}</p>
                                        </div>
                                        <div class="col"></div>
                                        <div class="col">
                                            <p><b>Ciudad: </b>{{ $citaReservada->paciente->ciudad }}</p>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p><b>Descripción: </b>{!! Form::textarea('descripcion', $citaReservada->descripcion, ['class'=>'form-control','rows'=>4,'disabled'=>'disabled']) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <a href="{{ route('inicio') }}"><button type="button"
                                class="btn btn-primary float-left">Atrás</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('/assets/js/getAge.js') }}"></script>
<script src="{{ asset('/assets/js/convertDate.js') }}"></script>
@endpush