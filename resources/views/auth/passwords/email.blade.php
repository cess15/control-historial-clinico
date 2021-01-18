@extends('auth.app')

@section('content')
<div class="login-page">
    <div class="row justify-content-center">
        <div class="form">
            <form method="POST" action="{{ url('password/email') }}">
                @csrf
                <div class="form-group row">

                    <div class="col">
                        <input id="correo" type="text" class="form-control @error('correo') is-invalid @enderror"
                            name="correo" value="{{ old('correo') }}" placeholder="Correo electrónico"
                            autocomplete="correo" autofocus>
                        <p>{{ route('password.email')}}</p>
                        <p>{{ route('password.update')}}</p>
                        @error('correo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col offset-md-0">
                        <button type="submit">
                            Restablecer contraseña
                        </button>
                    </div>
                </div>
                <p class="message"><a href="{{ url('/login') }}">Regresar</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
