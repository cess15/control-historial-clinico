@extends('layouts.app')
@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{ route('users.index')}}" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"><span
                        class="ml-2">Regresar</span></i></a>
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
            @if($error=='validation.ecuador')
            <li>Cédula no válida</li>
            @else
            <li>{{ $error }}</li>
            @endif
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Nuevo empleado</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            {!! Form::open(['route' => ['users.store'], 'method' => 'POST']) !!}
            {!! Form::token() !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('nombres', 'Nombres(*)') }}
                        {{ Form::text('nombres', null, ['placeholder'=>'Ingrese nombres', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('apellidos', 'Apellidos(*)') }}
                        {{ Form::text('apellidos', null, ['placeholder'=>'Ingrese apellidos', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('cedula', 'Cédula(*)') }}
                        {{ Form::text('cedula', null, ['placeholder'=>'Ingrese cédula', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('email', 'Correo electrónico(*)') }}
                        {{ Form::text('email', null, ['placeholder'=>'Ingrese correo electrónico', 'class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('telefono', 'Número celular(*)') }}
                        {{ Form::text('telefono', null, ['placeholder'=>'Ingrese número celular', 'class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('genero', 'Género(*)') }}
                        {!! Form::select('genero', ['--Seleccione--','Masculino'=>'Masculino','Femenino'=>'Femenino'],
                        null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('cargo', 'Cargo(*)') }}
                        {!! Form::select('cargo', ['--Seleccione--','4'=>'Secretaria','5'=>'Cajero'],
                        null, ['class'=>'form-control']) !!}
    
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