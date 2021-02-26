<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') | CAFSI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('/assets/lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ ('/assets/lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ ('/assets/lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/assets/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/lte/plugins/datatables-autofill/css/autoFill.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/lte/plugins/datatables-select/css/select.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('/assets/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/lte/plugins/datatables-select/css/select.bootstrap4.min.css')}}">
    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('/assets/lte/plugins/select2/css/select2.min.css')}}">

    <!-- Bootstrap Date-Picker Plugin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

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
                @yield('content')
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
    <!-- jQuery -->
    <script src="{{ asset('/assets/lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/assets/lte/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <!-- DataTables -->
    <script src="{{ asset('/assets/lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/assets/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/assets/lte/plugins/datatables-autofill/js/dataTables.autoFill.min.js')}}"></script>
    <script src="{{ asset('/assets/lte/plugins/datatables-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{ asset('/assets/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('/assets/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/assets/lte/plugins/datatables-select/js/select.bootstrap4.min.js')}}"></script>
    {{-- Select2 --}}
    <script src="{{ asset('/assets/lte/plugins/select2/js/select2.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('/assets/lte/dist/js/adminlte.js') }}"></script>
    {{-- Bootstrap switch --}}
    <script src="{{ asset('/assets/lte/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <!-- My script -->
    @stack('scripts')
</body>

</html>