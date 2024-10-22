@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Rol</h1>
    <form action="{{ route('roles.update', $rol->idRol) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombreRol">Nombre del Rol:</label>
            <input type="text" name="nombreRol" class="form-control" value="{{ old('nombreRol', $rol->nombreRol) }}" required>
            @error('nombreRol')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar Rol</button>
    </form>
</div>
@endsection
