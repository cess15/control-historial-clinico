@extends('layouts.app')
@if(Auth::user()->role_id==3)
@section('title', 'Paciente')
@endif
@section('content')
<div class="container">
    <span>ID: {{$especialidad->id}}</span>
</div>
@endsection