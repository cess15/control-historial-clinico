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
                    <li class="breadcrumb-item active">Doctor</li>
                    <li class="breadcrumb-item">Consultas</li>
                    <li class="breadcrumb-item">Recetas</li>
                </ol>
            </div>
            <div class="row mb-3">
                <!-- SEARCH FORM -->
                <div class="ml-2">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ route('recetas.index') }}">
                                <button class="btn btn-navbar" type="button">
                                    <i class="fas fa-arrow-alt-circle-left"></i>
                                </button>
                            </a>
                        </div>
                        <input class="form-control form-control-navbar" type="text" placeholder="Buscar"
                            aria-label="Search" autofocus id="search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                @foreach($medicos as $medico)
                <a href="{{ route('recetas.getMedico',$medico->id) }}" class="info-id text-dark">
                    <li class="info-column list-group-item" style="cursor: pointer;">
                        <div class="card-footer card-comments">
                            <div class="card-comment">
                                <img src="{{ $medico->user->url_imagen_perfil }}" class="img-circle img-sm" width="50px"
                                    height="50px" alt="foto_perfil">
                                <div class="comment-text">
                                    <span class="username">Dr. <span class="info-title">{{$medico->user->apellidos}}
                                            {{$medico->user->nombres}}</span>
                                    </span>
                                    <span>Especialidad: {{ $medico->especialidad->name }}</span>
                                    <br>
                                    <span>Correo: {{ $medico->user->email }}</span>
                                    <br>
                                    <span>Telefono: {{ $medico->user->telefono }}</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </a>
                @endforeach
            </ul>
            <div class="card-footer">
                <div class="pagination justify-content-center m-0">{{ $medicos->links() }}</div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <a href="{{ route('recetas.index') }}"><button type="button"
                            class="btn btn-primary float-left">Atrás</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('/assets/js/consultation.js') }}"></script>
@endpush