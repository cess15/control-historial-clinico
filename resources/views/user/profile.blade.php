@extends('layouts.app')

@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content-header')
<div class="row mb-2">
    <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('perfil')}}"
                    class="{{ Request::path() === 'perfil' ? 'breadcrumb-item active' : 'breadcrumb-item' }}">Mi
                    perfil</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('perfil.edit')}}"
                    class="{{ Request::path() === 'perfil/editar' ? 'breadcrumb-item active' : 'breadcrumb-item' }}">Actualizar
                    Datos
                </a>
            </li>
        </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@section('content')
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Mis Datos</h3>
        </div>
        <div class="form">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="nombres">Nombres</label>
                            <p> {{ Auth::user()->nombres }} </p>
                        </div>
                        <div class="col-6">
                            <label for="nombres">Apellidos</label>
                            <p>{{ Auth::user()->apellidos }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="cedula">Cédula</label>
                            @if(!Auth::user()->cedula)
                            <p><span class='badge badge-danger'>Actualice este dato</span></p>
                            @endif
                            <p>{{ Auth::user()->cedula }} </p>
                        </div>
                        <div class="col-6">
                            <label for="email">Correo electrónico</label>
                            <p>{{ Auth::user()->email }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="telefono">Télefono</label>
                            @if(!Auth::user()->telefono)
                            <p><span class='badge badge-danger'>Actualice este dato</span></p>
                            @endif
                            <p>{{ Auth::user()->telefono }} </p>
                        </div>
                        <div class="col-6">
                            <label for="genero">Género</label>
                            @if(!Auth::user()->genero)
                            <p><span class='badge badge-danger'>Actualice este dato</span></p>
                            @endif
                            <p>{{ Auth::user()->genero }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection