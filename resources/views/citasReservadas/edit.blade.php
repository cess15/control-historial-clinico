@extends('layouts.app')
@if(Auth::user()->role_id==5)
@section('title', 'Cajero')
@endif
@section('content')
<div class="container">
    ID: {{ $citaReservada->id }}
</div>
@endsection
