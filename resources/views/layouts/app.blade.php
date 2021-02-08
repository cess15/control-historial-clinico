<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') | CAFSI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/app.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    {{-- <link rel="stylesheet" href="/assets/lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> --}}
    <!-- iCheck -->
    {{-- <link rel="stylesheet" href="/assets/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> --}}
    <!-- JQVMap -->
    {{-- <link rel="stylesheet" href="/assets/lte/plugins/jqvmap/jqvmap.min.css"> --}}
    <!-- Select 2 -->
    {{-- <link rel="stylesheet" href="/assets/lte/plugins/select2/css/select2.min.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/lte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    {{-- <link rel="stylesheet" href="/assets/lte/plugins/daterangepicker/daterangepicker.css"> --}}
    <!-- summernote -->
    {{-- <link rel="stylesheet" href="/assets/lte/plugins/summernote/summernote-bs4.css"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">

        <!-- Navbar -->
        @include('theme.lte.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('theme.lte.aside')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    @yield('content-header')
                    
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        @include('theme.lte.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0db7df2fff.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="/assets/lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select 2 -->
    {{-- <script src="/assets/lte/plugins/select2/js/select2.min.js"></script> --}}
    <!-- Bootstrap 4 Duallistbox -->
    {{-- <script src="/assets/lte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script> --}}
    <!-- InputMask -->
    {{-- <script src="/assets/lte/plugins/moment/moment.min.js"></script> --}}
    {{-- <script src="/assets/lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script> --}}
    <!-- ChartJS -->
    {{-- <script src="/assets/lte/plugins/chart.js/Chart.min.js"></script> --}}
    <!-- Sparkline -->
    {{-- <script src="/assets/lte/plugins/sparklines/sparkline.js"></script> --}}
    <!-- JQVMap -->
    {{-- <script src="/assets/lte/plugins/jqvmap/jquery.vmap.min.js"></script> --}}
    {{-- <script src="/assets/lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> --}}
    <!-- jQuery Knob Chart -->
    {{-- <script src="/assets/lte/plugins/jquery-knob/jquery.knob.min.js"></script> --}}
    <!-- daterangepicker -->
    {{-- <script src="/assets/lte/plugins/moment/moment.min.js"></script> --}}
    {{-- <script src="/assets/lte/plugins/daterangepicker/daterangepicker.js"></script> --}}
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <script src="assets/lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> --}}
    <!-- Summernote -->
    {{-- <script src="/assets/lte/plugins/summernote/summernote-bs4.min.js"></script> --}}
    <!-- overlayScrollbars -->
    {{-- <script src="/assets/lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> --}}
    <!-- AdminLTE App -->
    <script src="/assets/lte/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('assets/lte/dist/js/demo.js') }}"></script> --}}
    <!-- My script -->
    @stack('scripts')
    
    
</body>

</html>