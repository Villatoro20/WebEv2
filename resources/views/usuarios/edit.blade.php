@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('usuarios.update', $usuario->idUsuario) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre del Usuario:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}" required>
            @error('nombre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña (dejar en blanco para no cambiar):</label>
            <input type="password" name="password" class="form-control">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <div class="form-group">
            <label for="idRol">Rol:</label>
            <select name="idRol" class="form-control" required>
                <option value="">Seleccione un rol</option>
                @foreach($roles as $rol)
                    <option value="{{ $rol->idRol }}" {{ old('idRol', $usuario->idRol) == $rol->idRol ? 'selected' : '' }}>
                        {{ $rol->nombreRol }}
                    </option>
                @endforeach
            </select>
            @error('idRol')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="activo">Activo:</label>
            <select name="activo" class="form-control" required>
                <option value="1" {{ old('activo', $usuario->activo) == 1 ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('activo', $usuario->activo) == 0 ? 'selected' : '' }}>No</option>
            </select>
            @error('activo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar Usuario</button>
    </form>
</div>
@endsection
