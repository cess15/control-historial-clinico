@extends('layouts.app')
@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content')
<div class="container">
    @if(session('msg'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>Excelente</h5>
        <ul>
            <li>{{ session("msg") }}</li>
        </ul>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i>Error</h5>
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{ route('inicio')}}" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"><span
                        class="ml-2">Regresar</span></i></a>
        </div>
    </div>
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Datos del médico</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if($medico->user->url_imagen_perfil!=null)
            <div class="row">
                <div class="col-lg-3">
                    <div class="user_profile">
                        <div class="user-pro-img">
                            <img src="{{ $medico->user->url_imagen_perfil }}" id="img_loader" class="img_profile"
                                width="180px" height="180px" alt="foto_perfil">
                        </div>
                    </div>
                </div>
            </div>
            @endif
            {!! Form::open(['route' => ['medicos.update', $medico->id], 'method' => 'POST']) !!}
            {!! Form::token() !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('nombres', 'Nombres(*)') }}
                        {{ Form::text('nombres', $medico->user->nombres, ['placeholder'=>'Ingrese nombres', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('apellidos', 'Apellidos(*)') }}
                        {{ Form::text('apellidos', $medico->user->apellidos, ['placeholder'=>'Ingrese apellidos', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('email', 'Correo electrónico(*)') }}
                        {{ Form::text('email', $medico->user->email, ['placeholder'=>'Ingrese correo electrónico', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('telefono', 'Número celular(*)') }}
                        {{ Form::text('telefono', $medico->user->telefono, ['placeholder'=>'Ingrese número celular', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('genero', 'Género(*)') }}
                        <select name="genero" class="form-control">
                            <option selected disabled>-- Seleccione --</option>
                            <option value="Masculino" {{ $medico->user->genero==='Masculino' ? 'selected' : ''}}>
                                Masculino</option>
                            <option value="Femenino" {{ $medico->user->genero==='Femenino' ? 'selected' : ''}}>
                                Femenino</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('especialidad_id', 'Especialidad(*)') }}
                        <select name="especialidad_id" class="form-control">
                            <option selected disabled>-- Seleccione --</option>
                            @foreach ($especialidades as $especialidad)
                            <option value="{{$especialidad->id}}"
                                {{ $medico->especialidad_id===$especialidad->id ? 'selected' : '' }}>
                                {{$especialidad->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Guardar datos</button>
                    <button type="reset" class="btn btn-danger">Resetear</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection