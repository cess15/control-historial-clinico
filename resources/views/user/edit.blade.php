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

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('perfil.update',Auth::user()) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->nombres }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombres">Apellidos</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->apellidos }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cedula">Cédula</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->cedula }}"
                                placeholder="{{ Auth::user()->cedula!=null ? '' : 'Número de cédula'}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono">Télefono</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->telefono }}"
                                placeholder="{{ Auth::user()->telefono!=null ? '' : 'Número de télefono'}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="genero">Género</label>
                            <select name="genero" class="form-control">
                                <option selected disabled>-- Seleccione --</option>
                                <option value="Masculino" {{ Auth::user()->genero==='Masculino' ? 'selected' : ''}}>
                                    Masculino</option>
                                <option value="Femenino" {{ Auth::user()->genero==='Femenino' ? 'selected' : ''}}>
                                    Femenino</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Guardar datos</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection