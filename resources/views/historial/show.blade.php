@extends('layouts.app')
@if(Auth::user()->role_id==2)
@section('title', 'Medico')
@endif
@section('content')
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <div class="card-title">Historial del paciente </div>
        </div>
        @foreach ($consultas as $consulta)
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ $consulta->historial->paciente->user->url_imagen_perfil }}" alt="img_paciente"
                        class="img-circle img-fluid" width="250px">
                    <div class="card-text mt-2"><b>Operado: </b>{{ $consulta->historial->operado!=false ? 'Si' : 'No' }}
                    </div>
                    <div class="card-text mt-2"><b>Enfermedad cardiaca:
                        </b>{{ $consulta->historial->enfermedad_cardiaca!=false ? 'Si' : 'No' }}</div>
                    <div class="card-text mt-2"><b>Tipo de sangre: </b>{{ $consulta->historial->paciente->tipo_sangre }}
                    </div>
                    <div class="card-text mt-2"><b>Discapacidad:
                        </b>{{ $consulta->historial->paciente->discapacidad!=false ? 'Si' : 'No' }}</div>
                </div>
                <div class="col mt-2 ml-2">
                    <div class="card-text">
                        <h5>Médico tratante:
                            {{ $consulta->medico->user->nombres.' '.$consulta->medico->user->apellidos }}</h5>
                        <p>Fecha: <span class="info-date-tz">{{ $consulta->created_at }}</span></p>
                    </div>
                    <div class="card-text">
                        <h5>Diágnostico:</h5>
                        {!! Form::textarea('diagnostico', $consulta->diagnostico,
                        ['class'=>'form-control','disabled'=>'disabled','rows'=>6]) !!}
                    </div>
                    <div class="card-text">
                        <h5>Recomendación: </h5>
                        {!! Form::textarea('recomendacion', $consulta->recomendacion,
                        ['class'=>'form-control','disabled'=>'disabled','rows'=>6]) !!}
                    </div>
                    <div class="card-text">
                        <h5>Observación:</h5>
                        {!! Form::textarea('observacion', $consulta->observacion,
                        ['class'=>'form-control','disabled'=>'disabled','rows'=>6]) !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row p-2">
            <div class="col">
                <a href="{{ route('historial.index') }}"><button type="button" class="btn btn-primary">Atras</button></a>
            </div>
        </div>
        <div class="card-footer">
            <div class="pagination justify-content-center m-0">{{ $consultas->links() }}</div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('/assets/js/convertDate.js') }}"></script>
@endpush