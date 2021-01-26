@extends('layouts.app')

@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content')
<div class="container">
    <h3 class="m-0 text-dark text-center text-lg-center text-md-center text-sm-center text-xl-center">Perfil</h3>
    <p>Bienvenido {{$user->nombres.' '.$user->apellidos}} con tu Rol: {{ $user->rol->nombre}}</p>
</div>
@endsection