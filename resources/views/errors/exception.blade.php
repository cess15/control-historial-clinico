<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CAFSI | 404 Page not found</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    {{-- <link rel="stylesheet" href="{{ ('/assets/lte/dist/css/adminlte.min.css') }}"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="container-fluid bg-light">
        <!-- Content Wrapper. Contains page content -->
        <div class="container mt-5">
            <!-- Content Header (Page header) -->
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-danger">404 Error Page</h1>
                </div>
            </div><!-- /.container-fluid -->

            <!-- Main content -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-2">
                        <h2 class="headline text-danger"> 404</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="error-content">
                            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Página no encontrada.</h3>
                            <span class="bg-black">{{ $exception->getMessage() }}</span>
                            <p>
                                No pudimos encontrar la página que estabas buscando.
                                De igual manera, tu puedes <a href="{{ route('inicio') }}">retornar a la aplicación</a>
                            </p>
                        </div>
                    </div>
                    <!-- /.error-content -->
                </div>
            </div>
            <!-- /.error-page -->
            <!-- /.content -->
        </div>
        @include('theme.lte.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/assets/lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/assets/lte/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>