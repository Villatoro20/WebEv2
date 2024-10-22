@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $usuario->nombre }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $usuario->email }}</p>
            <p class="card-text"><strong>Rol:</strong> {{ $usuario->rol->nombreRol }}</p>
            <p class="card-text"><strong>Activo:</strong> {{ $usuario->activo ? 'Sí' : 'No' }}</p>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
