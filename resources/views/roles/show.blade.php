@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Rol</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $rol->nombreRol }}</h5>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
