@extends('layouts.app')
@if(Auth::user()->role_id==1)
@section('title', 'Administrador')
@endif
@section('content')
<div class="container">
    @if(Auth::user()->role_id==1)
    <p>Aqui saldran solo las citas reservadas que han sido canceladas para generar el reporte mensual</p>
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
                <th scope="col">Día</th>
                <th scope="col">Hora</th>
                <th scope="col">Precio</th>
                <th scope="col">Estado</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha de creación</th>
            </tr>
        </thead>
    </table>
    @endif
</div>
@endsection
@if(Auth::user()->role_id==1)
@push('scripts')
{{-- Data de citas reservadas solo pagadas --}}
@endpush
@endif