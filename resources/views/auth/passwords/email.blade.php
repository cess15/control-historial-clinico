@extends('auth.app')

@section('content')
<div class="login-page">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="form">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group row">

                    <div class="col">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Correo electrónico"
                            autocomplete="correo" autofocus>
                        @error('email')
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
                <p class="message"><a href="{{ route('login') }}">Regresar</a></p>
            </form>
        </div>
    </div>
</div>
@endsection