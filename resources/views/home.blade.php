@extends('layouts.app')

@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@if(Auth::user()->role_id==2)
@section('title', 'Medico')
@endif
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content')
<div class="container">
    @if(Auth::user()->role_id==1)
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de Medicos</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{ route('medicos.create')}}" class="btn btn-primary"><i class="fa fa-plus"><span
                        class="ml-2">Nuevo médico</span></i></a>
        </div>
    </div>
    <table id="tableMedic" class="display nowrap table table-bordered table-hover" style="width: 100%;">
        <thead>

            <tr>
                <th scope="col">Cédula</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Número célular</th>
                <th scope="col">Género</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
    </table>
    @endif
    @if(Auth::user()->role_id==2)
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Bienvenido</h1>
                </div>
                <div class="card-body">
                    @if(Auth::user()->updated)
                    <h5><strong>Nombre:</strong> {{ $name }} {{ $lastName }}</h5>
                    <h5><strong>Nombre de usuario:</strong> {{ Auth::user()->usuario }}</h5>
                    @else
                    <h3><em>Ha sido registrado correctamente, antes de continuar es importante que actualice sus datos.
                            Por favor de click en el siguiente enlace, <b><a href="{{route('perfil.edit')}}">"Actualizar
                                    mis datos"</a></b>.</em></h3>
                    <hr>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    @if(Auth::user()->role_id==3)
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Bienvenido</h1>
                </div>
                <div class="card-body">
                    @if(Auth::user()->updated)
                    <h5><strong>Nombre:</strong> {{ $name }} {{ $lastName }}</h5>
                    <h5><strong>Nombre de usuario:</strong> {{ Auth::user()->usuario }}</h5>
                    @else
                    <h3><em>Ha sido registrado correctamente, antes de continuar es importante que actualice sus datos.
                            Por favor de click en el siguiente enlace, <b><a href="{{route('perfil.edit')}}">"Actualizar
                                    mis datos"</a></b>.</em></h3>
                    <hr>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    
</div>
@endsection
@if(Auth::user()->role_id==1)
@push('scripts')
<script type="text/javascript">
    $("#tableMedic").DataTable({
    proccessing: true,
    serverSide: true,
    pageLength: 5,
    ajax: `{{ route('medicos.data') }}`,
    type: "GET",
    autoFill: true,
    responsive: true,
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
        { data: "especialidad"},
        { data: "botones"},
    ],
});
</script>
@endpush
@endif