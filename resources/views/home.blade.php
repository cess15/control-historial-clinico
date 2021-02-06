@extends('layouts.app')

@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Bienvenido</h1>
                </div>
                <div class="card-body">
                    @if(Auth::user()->updated)
                    <h5><strong>Nombre:</strong> {{ $name }} {{ $lastName }}</h5>
                    <h5><strong>Nombre de usuario:</strong> {{ Auth::user()->usuario }}</h5>
                    @else
                    <h3><em>Ha sido registrado correctamente, antes de continuar es importante que actualice sus datos.
                        Por favor de click en el siguiente enlace, <b><a href="{{route('perfil.edit')}}">"Actualizar mis datos"</a></b>.</em></h3>
                    <hr>
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>
@endsection