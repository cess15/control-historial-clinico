@extends('layouts.app')
@if(Auth::user()->role_id==2)
@section('title', 'Medico')
@endif
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Detalles de la receta</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('recetas.generarReceta',$receta->id) }}" class="btn btn-primary float-right" target="_blank">Generar receta</a>
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
                                <a href="{{ route('inicio') }}"><button type="button"
                                        class="btn btn-danger float-left">Finalizar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
