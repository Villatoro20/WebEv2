@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Rol</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombreRol">Nombre del Rol:</label>
            <input type="text" name="nombreRol" class="form-control" value="{{ old('nombreRol') }}" required>
            @error('nombreRol')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Crear Rol</button>
    </form>
</div>
@endsection
