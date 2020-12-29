<!DOCTYPE html>
<html>
<title>CAFSI | CLMR</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<body>
    <div class="login-page">
        <div class="form">
            <form class="register-form">
                <input type="text" placeholder="Nombres" />
                <input type="password" placeholder="Contraseña" />
                <input type="text" placeholder="Correo electrónico" />
                <button>Registrarse</button>
                <p class="message">¿Ya tiene una cuenta? <a href="#">Inicie sesión</a></p>
            </form>
            <form class="login-form">
                <input type="text" placeholder="Nombre de usuario" />
                <input type="password" placeholder="Contraseña" />
                <button>Iniciar sesión</button>
                <p class="message">¿No está registrado? <a href="#">Crear una cuenta</a></p>
            </form>
        </div>
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>