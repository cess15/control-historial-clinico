@extends('layouts.app')
@if(Auth::user()->role_id===1)
@section('title', 'Administrador')
@endif
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content')
<div class="container">
    @if(Auth::user()->role_id==1)
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de Citas</h1>
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
                    <th scope="col">Día</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
    @endif
</div>
@endsection
@if(Auth::user()->role_id==1)
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