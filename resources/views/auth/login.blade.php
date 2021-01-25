@extends('auth.app')
@section('content')
<div class="login-page">
    <div class="form">
        {!! Form::open( ['route' => ['login'], 'method'=>'POST']) !!}
        {!! Form::token() !!}
        <input id="usuario" type="text" value="{{ old('usuario') }}" name="usuario"
            placeholder="Nombre de usuario o Correo" autofocus />
        {!! $errors->first('usuario', '<span class="error text-danger">:message</span>') !!}
        <input id="password" type="password" name="password" placeholder="Contraseña" />
        {!! $errors->first('password', '<span class="error text-danger">:message</span>') !!}
        <button type="submit">Iniciar sesión</button>
        {!! Form::close() !!}
        <p class="message">¿No está registrado? <a href="{{ route('register') }}">Crear una cuenta</a></p>
        <p class="message"><a href="{{ route('password.request') }}">¿Olvidó su contraseña?</a></p>
        <a href="{{ route('landing') }}"><button type="button" class="mt-3">Regresar</button></a>
    </div>
</div>
@endsection