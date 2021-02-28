@extends('layouts.app')
@if(Auth::user()->role_id==1)
@section('title', 'Administrador')
@endif
@section('content')
<div class="container">
    @if(Auth::user()->role_id==1)
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Lista de Citas Reservadas</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    <table id="tableCitas" class="display nowrap table table-bordered table-hover" style="width: 100%;">
        <thead>

            <tr>
                <th scope="col">Paciente</th>
                <th scope="col">Médico</th>
                <th scope="col">Fecha de cita</th>
                <th scope="col">Hora</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de pago</th>
            </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Total:</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
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
        ajax: `{{ route('citasReservadas.data') }}`,
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
        ],
        rowCallback: function(row, data, index)
        {
            if(data.estado==="Reservada"){
                $(row).find('td:eq(5)').css('color', 'green');
            }
            if(data.estado==="Cancelada"){
                $(row).find('td:eq(5)').css('color', 'red');
            }
        },
        footerCallback: function(row, data, start, end, display)
        {
            total = this.api().column(4).data().reduce(function(start, end){
                return parseInt(start)+parseInt(end.replace('$ ',''));
            }, 0)
            $(this.api().column(4).footer()).html('Total: $'+total);

        }
    })
</script>
@endpush
@endif