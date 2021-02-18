@extends('layouts.app')
@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{ route('citas.index')}}" class="btn btn-primary"><i class="fa fa-arrow-alt-circle-left"><span
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
            <h3 class="card-title">Nuevo cupo</h3>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => ['citas.store'], 'method' => 'POST']) !!}
            {!! Form::token() !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('medico', 'Buscar') }}
                        <select id="medico" class="searchMedic form-control col-md-10" name="medico"></select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('dia', 'Día(*)') }}
                        {!! Form::select('dia',
                        ['--Seleccione--','Lunes'=>'Lunes','Martes'=>'Martes','Miércoles'=>'Miércoles','Jueves'=>'Jueves','Viernes'=>'Viernes'],
                        null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('hora', 'Hora(*)') }}
                        {!! Form::time('hora', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('precio', 'Precio(*)') }}
                        {!! Form::text('precio', null, ['class'=>'form-control']) !!}
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