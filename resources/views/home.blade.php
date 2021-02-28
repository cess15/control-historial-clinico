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
@if(Auth::user()->role_id==4)
@section('title', 'Secretaria')
@endif
@if(Auth::user()->role_id==5)
@section('title', 'Cajero')
@endif
@section('content')
<div class="container">
    @if(Auth::user()->role_id==1)
    @if(Auth::user()->updated)
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
    @else
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Bienvenido</h1>
                </div>
                <div class="card-body">
                    <h3><em>Ha sido registrado correctamente, antes de continuar es importante que actualice sus datos.
                            Por favor de click en el siguiente enlace, <b><a href="{{route('perfil.edit')}}">"Actualizar
                                    mis datos"</a></b>.</em></h3>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

    @if(Auth::user()->role_id==2)
    @if(Auth::user()->updated)
    @if(sizeof($citasReservadas)!=0)
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Citas no atendidas</h1>
        </div>
    </div>
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                @foreach($citasReservadas as $citaReservada)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            {{ $citaReservada->paciente->ocupacion }}
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead">
                                        <b>{{ $citaReservada->paciente->user->nombres.' '.$citaReservada->paciente->user->apellidos}}</b>
                                    </h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-building"></i></span> Dirección:
                                            {{ $citaReservada->paciente->direccion }},
                                            {{ $citaReservada->paciente->ciudad }}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Télefono : {{ $citaReservada->paciente->user->telefono }}</li>
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-calendar-alt"></i></span> Fecha: <span
                                                class="info-date">{{ $citaReservada->cita->dia }}</span></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-clock"></i></span>
                                            Hora: {{ $citaReservada->cita->hora }}</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="{{ $citaReservada->paciente->user->url_imagen_perfil }}"
                                        alt="img_paciente" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="{{ route('citasReservadas.show',$citaReservada->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> Ver detalles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <div class="pagination justify-content-center m-0">{{ $citasReservadas->links() }}</div>
        </div>
    </div>
    @else
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Aviso!</h4>
        <p>Actualmente no tiene citas que atender, en cuánto la tenga, podrá ejercer su trabajo pero por el momento no
            hay nada que hacer hasta ahora.</p>
        <hr>
        <p class="mb-0">De igual manera, esperamos que tenga un excelente día.</p>
    </div>
    @endif
    @else
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Bienvenido</h1>
                </div>
                <div class="card-body">
                    <h3><em>Ha sido registrado correctamente, antes de continuar es importante que actualice sus datos.
                            Por favor de click en el siguiente enlace, <b><a href="{{route('perfil.edit')}}">"Actualizar
                                    mis datos"</a></b>.</em></h3>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

    @if(Auth::user()->role_id==3)
    @if(Auth::user()->updated)
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mis citas reservadas</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <table id="tableCitasReservadas" class="display nowrap table table-bordered table-hover" style="width: 100%;">
        <thead>

            <tr>
                <th scope="col">Médico</th>
                <th scope="col">Fecha de cita</th>
                <th scope="col">Hora</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de reservación</th>
            </tr>
        </thead>
    </table>
    @else
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Bienvenido</h1>
                </div>
                <div class="card-body">
                    <h3><em>Ha sido registrado correctamente, antes de continuar es importante que actualice sus datos.
                            Por favor de click en el siguiente enlace, <b><a href="{{route('perfil.edit')}}">"Actualizar
                                    mis datos"</a></b>.</em></h3>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

    @if(Auth::user()->role_id==4)
    @if(Auth::user()->updated)
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de cupos generados</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
        <div class="col-md-6">
            <a href="{{ route('citas.create')}}" class="btn btn-primary"><i class="fa fa-plus"><span
                        class="ml-2">Generar cupo</span></i></a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="tableCitas" class="display nowrap table table-bordered table-hover" style="width: 100%;">
            <thead>

                <tr>
                    <th scope="col">Médico</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
    @else
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Bienvenido</h1>
                </div>
                <div class="card-body">
                    <h3>
                        <em>Ha sido registrado correctamente, antes de continuar es importante que actualice sus datos.
                            Por favor de click en el siguiente enlace,
                            <b><a href="{{route('perfil.edit')}}">"Actualizar mis datos"</a></b>.
                        </em>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endif

    @if(Auth::user()->role_id==5)
    @if(Auth::user()->updated)
    <table id="tableCitasReservadas" class="display nowrap table table-bordered table-hover" style="width: 100%;">
        <thead>

            <tr>
                <th scope="col">Médico</th>
                <th scope="col">Paciente</th>
                <th scope="col">Fecha de cita</th>
                <th scope="col">Hora</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de reservación</th>
                <th scope="col">Pago</th>
            </tr>
        </thead>
    </table>
    @else
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Bienvenido</h1>
                </div>
                <div class="card-body">
                    <h3>
                        <em>Ha sido registrado correctamente, antes de continuar es importante que actualice sus datos.
                            Por favor de click en el siguiente enlace,
                            <b><a href="{{route('perfil.edit')}}">"Actualizar mis datos"</a></b>.
                        </em>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    @endif
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

@if(Auth::user()->role_id==2)
@push('scripts')
<script src="{{ asset('/assets/js/convertDate.js') }}"></script>
@endpush
@endif

@if(Auth::user()->role_id==3)
@push('scripts')
<script type="text/javascript">
    $("#tableCitasReservadas").DataTable({
        proccessing: true,
        serverSide: true,
        pageLength: 5,
        ajax: `{{ route('citasReservadas.paciente') }}`,
        type: "GET",
        responsive:true,
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
            { data: 'medico'},
            { data: 'fechaCita'},
            { data: 'hora'},
            { data: 'precio'},
            { data: 'estado'},
            { data: 'fechaRegistro'},
        ],
        rowCallback: function(row, data, index)
        {
            if(data.estado==="Reservada"){
                $(row).find('td:eq(4)').css('color', 'green');
            }
            if(data.estado==="Cancelada"){
                $(row).find('td:eq(4)').css('color', 'red');
            }
        }
    });


</script>
@endpush
@endif

@if(Auth::user()->role_id==4)
@push('scripts')
<script type="text/javascript">
    $("#tableCitas").DataTable({
    proccessing: true,
    serverSide: true,
    pageLength: 5,
    ajax: `{{ route('citas.data') }}`,
    type: "GET",
    responsive:true,
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
        { data: 'medico'},
        { data: 'dia'},
        { data: 'hora'},
        { data: 'precio'},
        { data: 'agendada'},
        { data: 'fecha_creacion'},
        { data: 'botones'},
    ],
    rowCallback: function(row, data, index)
    {
        if(data.agendada==="Disponible"){
            $(row).find('td:eq(4)').css('color', 'green');
        }
        if(data.agendada==="Reservada"){
            $(row).find('td:eq(4)').css('color', 'red');
        }
    }
});
</script>
@endpush
@endif

@if(Auth::user()->role_id==5)
@push('scripts')
<script type="text/javascript">
    $("#tableCitasReservadas").DataTable({
        proccessing: true,
        serverSide: true,
        pageLength: 5,
        ajax: `{{ route('citasReservadas.allData') }}`,
        type: "GET",
        responsive:true,
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
            { data: 'medico'},
            { data: 'paciente'},
            { data: 'fechaCita'},
            { data: 'hora'},
            { data: 'precio'},
            { data: 'estado'},
            { data: 'fechaRegistro'},
            { data: 'botones'},
        ],
        rowCallback: function(row, data, index)
        {
            if(data.estado==="Reservada"){
                $(row).find('td:eq(5)').css('color', 'green');
            }
            if(data.estado==="Cancelada"){
                $(row).find('td:eq(5)').css('color', 'red');
            }
        }
    });


</script>
@endpush
@endif