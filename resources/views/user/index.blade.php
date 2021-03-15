@extends('layouts.app')
@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@section('content')
@if(Auth::user()->role_id==1)
<div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de Empleados</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{ route('users.create')}}" class="btn btn-primary"><i class="fa fa-plus"><span class="ml-2">Nuevo
                        Empleado</span></i></a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="tableCitas" class="display nowrap table table-bordered table-hover" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">Cédula</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Número célular</th>
                    <th scope="col">Género</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endif
@endsection
@if(Auth::user()->role_id==1)
@push('scripts')
<script type="text/javascript">
    $("#tableCitas").DataTable({
    proccessing: true,
    serverSide: true,
    pageLength: 5,
    ajax: `{{ route('users.data') }}`,
    type: "GET",
    autoFill: true,
    language: {
        emptyTable: "No hay información",
        info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
        infoEmpty: "Mostrando 0 a 0 de 0 registros",
        infoFiltered: "(Filtrado de _MAX_ total registros)",
        lengthMenu:
            "Mostrar <select>" +
            '<option value="5">5</option>' +
            '<option value="10">10</option>' +
            '<option value="15">20</option>' +
            '<option value="20">40</option>' +
            "</select> registros",
        loadingRecords: "Cargando...",
        processing: "Procesando...",
        search: "Buscar:",
        zeroRecords: "Sin resultados encontrados",
        paginate: {
            first: "Primero",
            last: "Ultimo",
            next: "Siguiente",
            previous: "Anterior",
        },
    },
    columns: [
        { data: 'cedula'},
        { data: 'nombres'},
        { data: 'apellidos'},
        { data: 'email'},
        { data: 'telefono'},
        { data: 'genero'},
        { data: "cargo"},
        { data: "botones"},
    ]
});
</script>
@endpush
@endif