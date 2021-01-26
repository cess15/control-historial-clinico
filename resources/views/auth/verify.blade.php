@extends('auth.app')

@section('content')
<div class="login-page">
    <div class="form">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
        </div>
        @endif
        <div class="card-header">Verifique su correo electrónico</div>
        <div class="card-body">
            Antes de continuar, consulte su correo electrónico para ver si hay un enlace de verificación. Si
            no recibió el correo electrónico,
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="mt-2">
                    <p>Haga clic aquí para solicitar otro</p>
                </button>.
            </form>
        </div>
    </div>
</div>
@endsection