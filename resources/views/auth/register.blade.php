@extends('auth.app')

@section('content')
<div class="login-page">
    <div class="form">
        {!! Form::open(['route'=>['register'],'method'=>'POST']) !!}
        {!! Form::token() !!}
        <div class="input-group mb-3">
            <input name="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror"
                value="{{ old('nombres') }}" placeholder="Nombres" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            @error('nombres')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input name="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror"
                value="{{ old('apellidos') }}" placeholder="Apellidos" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            @error('apellidos')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" placeholder="Correo electrónico" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fas fa-at"></i>
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input name="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror"
                value="{{ old('usuario') }}" placeholder="Nombre de usuario" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fas fa-user-circle"></i>
                </div>
            </div>
            @error('usuario')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Contraseña" />
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fas fa-key"></i>
                </div>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input name="password_confirmation" class="form-control" type="password" required
                autocomplete="new-password" placeholder="Repita contraseña">
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fas fa-key"></i>
                </div>
            </div>

        </div>
        <button type="submit">Registrarse</button>
        <p class="message">¿Ya tiene una cuenta? <a href="{{ route('login') }}">Inicie sesión</a></p>
        {!! Form::close() !!}
    </div>
</div>
@endsection