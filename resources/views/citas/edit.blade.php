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
    <span>ID: {{ $cita->id }}</span>
</div>
@endsection