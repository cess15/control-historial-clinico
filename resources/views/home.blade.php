@extends('layouts.app')

@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content')
<div class="container">
    {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading"><b>!Bienvenido!</b></h4>
        <p>Ha sido registrado correctamente, antes de continuar es importante que actualice sus datos. 
            Por favor de click en el siguiente botón <b>"Actualizar mis datos"</b> que se muestra a continuación .</p>
        <hr>
        <a href="{{ route('perfil.edit') }}"><button type="button" class="btn btn-primary">Actualizar mis datos</button></a>
    </div> --}}
</div>
@endsection