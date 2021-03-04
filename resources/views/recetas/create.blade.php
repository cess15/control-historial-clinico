@extends('layouts.app')
@if(Auth::user()->role_id==2)
@section('title', 'Medico')
@endif
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card card-success">
                <div class="card-header">
                    <div class="card-title">Datos de la receta</div>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => ['recetas.store',$consulta->id] ]) !!}
                    {!! Form::token() !!}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('prescripcion', 'Prescripción') !!}
                                {!! Form::textarea('prescripcion', null, ['class'=>'form-control','rows'=>5])
                                !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('dosis', 'Dosis') !!}
                                {!! Form::textarea('dosis', null, ['class'=>'form-control','rows'=>5]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('horario', 'Horario') !!}
                                {!! Form::textarea('horario', null, ['class'=>'form-control','rows'=>5]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <a href="{{ route('inicio') }}"><button type="button" class="btn btn-danger float-left">Finalizar</button></a>
                                <button type="submit" class="btn btn-primary float-right">Recetar</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection