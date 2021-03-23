@extends('layouts.app')
@if(Auth::user()->role_id==2)
@section('title', 'Medico')
@endif
@section('content')
<div class="container">
    @if($paciente!=null)
    @if(session('msg'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>Excelente</h5>
        <ul>
            <li>{{ session("msg") }}</li>
        </ul>
    </div>
    @endif
    <div class="card card-success">
        <div class="card-header">
            <div class="card-title">Datos de la consulta</div>
        </div>
        <div class="card-body">
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
            {!! Form::open(['route'=>['consultas.store',$citaReservada->id], 'method'=>'POST']) !!}
            {!! Form::token() !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('diagnostico', 'Diagnostico') !!}
                        {!! Form::textarea('diagnostico', null, ['class'=>'form-control','rows'=>5]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('recomendacion', 'Recomendación') !!}
                        {!! Form::textarea('recomendacion', null, ['class'=>'form-control','rows'=>5]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('observacion', 'Observación') !!}
                        {!! Form::textarea('observacion', null, ['class'=>'form-control','rows'=>5]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <a href="{{ route('citasReservadas.show',$citaReservada->id) }}"><button type="button"
                                class="btn btn-primary float-left">Atrás</button></a>
                        <button type="submit" class="btn btn-primary float-right">Siguiente</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-header">
            <div class="card-title">Historial Clinico</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
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
                                    <b>Tipo de sangre</b> <a
                                        class="float-right">{{ $citaReservada->paciente->tipo_sangre}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Discapacidad</b> <a
                                        class="float-right">{{ $citaReservada->paciente->discapacidad!=false ? 'Si' :'No' }}</a>
                                </li>
                                @if($citaReservada->paciente->discapacidad==true)
                                <li class="list-group-item"><b>Tipo de discapacidad</b> <a
                                        class="float-right">{{ $citaReservada->paciente->tipo_discapacidad }}</a></li>
                                <li class="list-group-item"><b>Porcentaje de discapacidad</b> <a
                                        class="float-right">{{ $citaReservada->paciente->porcentaje.'%' }}</a></li>
                                @endif
                                <li class="list-group-item">
                                    <b>Edad</b> <a
                                        class="float-right info-edad">{{ $citaReservada->paciente->fecha_nacimiento }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Estado Civil</b> <a
                                        class="float-right">{{ $citaReservada->paciente->estado_civil }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header p-2">Datos del historial clinico</div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-exclamation-triangle"></i>Error</h5>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="card-text">Por favor complete el siguiente formulario</div>
                                    </div>
                                    {!! Form::open(['route'=>['historial.store',$citaReservada->paciente->id],
                                    'method'=>'POST']) !!}
                                    {!! Form::token() !!}
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::label('operado', 'Operado(*)') !!}
                                                <div class="custom-control custom-radio">
                                                    <input id="on" type="radio" name="operado" value="true"
                                                        class="custom-control-input" />
                                                    {!! Form::label('on', 'SI',['class'=>'custom-control-label']) !!}
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input id="off" type="radio" name="operado" value="false"
                                                        class="custom-control-input" />
                                                    {!! Form::label('off', 'NO',['class'=>'custom-control-label']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::label('enfermedad', 'Enfermedad Cardiaca(*)') !!}
                                                <div class="custom-control custom-radio">
                                                    <input id="yes" type="radio" name="enfermedad" value="true"
                                                        class="custom-control-input" />
                                                    {!! Form::label('yes', 'SI',['class'=>'custom-control-label']) !!}
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input id="not" type="radio" name="enfermedad" value="false"
                                                        class="custom-control-input" />
                                                    {!! Form::label('not', 'NO',['class'=>'custom-control-label']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($citaReservada->paciente->discapacidad==true)
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::label('descripcion', 'Descripción') !!}
                                                {!! Form::textarea('descripcion', null,
                                                ['class'=>'form-control','rows'=>8]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if($citaReservada->paciente->discapacidad==false)
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                {!! Form::label('descripcion', 'Descripción') !!}
                                                {!! Form::textarea('descripcion', null,
                                                ['class'=>'form-control','rows'=>4]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row mt-2">
                                        <div class="col">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Guardar datos</button>
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
@push('scripts')
<script src="{{ asset('/assets/js/getAge.js') }}"></script>
@endpush