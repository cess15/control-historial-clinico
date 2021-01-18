@extends('auth.app')

@section('content')
<div class="login-page">
    <div class="row justify-content-center">
        <div class="form">
            <h5 class="text-danger">Restablecer contraseña</h5>
            <form method="POST" action="{{ route('password.reset') }}">
                @csrf
                <div class="form-group row">
                    <div class="col">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror"
                            name="correo" value="{{ $correo ?? old('correo') }}" required autocomplete="correo"
                            autofocus placeholder="Correo electrónico">
                        @error('correo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="Contraseña">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Repita contraseña">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col offset-md-0">
                        <button type="submit">
                            Restablecer contraseña
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

