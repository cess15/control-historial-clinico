@extends('layouts.app')
@if(Auth::user()->role_id==4)
@section('title', 'Secretaria')
@endif
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{ route('inicio')}}" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"><span
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
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Editar cupo generado</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => ['citas.update',$cita->id], 'method' => 'POST']) !!}
            {!! Form::token() !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('medico', 'Buscar') }}
                        <select id="medico" class="searchMedic form-control col-md-10" name="medico">
                            <option value="{{$cita->medico->id}}" selected="selected">{{$cita->medico->user->nombres}}
                                {{$cita->medico->user->apellidos}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('dia', 'Día(*)') }}
                        {!! Form::date('dia', $cita->dia, ['class'=>'form-control','min'=>date('Y-m-d')]) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('hora', 'Hora(*)') }}
                        {!! Form::time('hora', $cita->hora, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('precio', 'Precio(*)') }}
                        {!! Form::text('precio', $cita->precio, ['class'=>'form-control']) !!}
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
@push('scripts')
<script type="text/javascript">
    $('.searchMedic').select2({
        placeholder: 'Busque un médico',
        language:{
            noResults: function(){
                return "No hay resultados";
            },
            searching: function(){
                return "Buscando..";
            },
        },
        ajax: {
            url: '/ajax-autocomplete-searchMedic',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nombres.concat(' ').concat(item.apellidos),
                            id:item.id
                        }
                    })
                };
            },
            cache: true
        },
    });
</script>
@endpush