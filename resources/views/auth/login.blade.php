@extends('auth.app')
@section('content')
<div class="login-page">
    @if(session('notify'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Bienvenido a CAFSI!</strong> {{ session('notify') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session('dangerous'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Lo sentimos!</strong> {{ session('dangerous') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="form">
        <form class="register-form" method="POST" action="{{ route('register') }}">
            @csrf
            <input name="nombres" type="text" placeholder="Nombres" />
            <input name="apellidos" type="text" placeholder="Apellidos" />
            <input name="email" type="text" placeholder="Correo electrónico" />
            <input name="usuario" type="text" placeholder="Nombre de usuario" />
            <input name="password" type="password" placeholder="Contraseña" />
            <input name="password_confirmation" type="password" required autocomplete="new-password"
                placeholder="Repita contraseña">
            <button type="submit">Registrarse</button>
            <p class="message">¿Ya tiene una cuenta? <a href="#">Inicie sesión</a></p>
        </form>
        {!! Form::open( ['action' => ['Auth\LoginController@login'], 'method'=>'POST', 'class'=>'form-login']) !!}
        {!! Form::token() !!}
        <input id="usuario" type="text" value="{{ old('usuario') }}" name="usuario"
            placeholder="Nombre de usuario o Correo" autofocus />
        {!! $errors->first('usuario', '<span class="error text-danger">:message</span>') !!}
        <input id="password" type="password" name="password" placeholder="Contraseña" />
        {!! $errors->first('password', '<span class="error text-danger">:message</span>') !!}
        <button type="submit">Iniciar sesión</button>
        <p class="message">¿No está registrado? <a href="#">Crear una cuenta</a></p>
        </p>
        {!! Form::close() !!}
        <p class="message"><a href="{{ url('password/reset') }}">¿Olvidó su contraseña?</a></p>
    </div>
</div>
@endsection