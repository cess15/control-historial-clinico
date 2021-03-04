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
        <div class="card-body">
            <div class="row">
                <ol class="breadcrumb float-sm-left ml-2">
                    <li class="breadcrumb-item"><a href="{{ route('recetas.index') }}">Especialidad</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('recetas.showViewEspecialidad',$receta->consulta->medico->especialidad->id) }}">Doctor</a>
                    </li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('recetas.getMedico',$receta->consulta->medico->id) }}">Consultas</a></li>
                    <li class="breadcrumb-item active">Recetas</li>
                </ol>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card card-success">
                        <div class="card-header">
                            <div class="card-title">Datos de la receta</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <a href="{{ route('recetas.generar',$receta->id) }}" class="btn btn-primary float-right" target="_blank">Generar receta</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        {!! Form::label('prescripcion', 'Prescripción') !!}
                                        {!! Form::textarea('prescripcion', $receta->detalleReceta->prescripcion, ['class'=>'form-control','rows'=>5,'disabled'=>'disabled'])
                                        !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('dosis', 'Dosis') !!}
                                        {!! Form::textarea('dosis', $receta->detalleReceta->dosis, ['class'=>'form-control','rows'=>5,'disabled'=>'disabled']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('horario', 'Horario') !!}
                                        {!! Form::textarea('horario', $receta->detalleReceta->horario, ['class'=>'form-control','rows'=>5,'disabled'=>'disabled']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <a href="{{ route('recetas.getMedico',$receta->consulta->medico->id) }}"><button type="button"
                                                class="btn btn-primary float-left">Regresar</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection