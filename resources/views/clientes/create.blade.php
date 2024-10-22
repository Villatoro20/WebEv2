@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Cliente:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
            @error('nombre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="numeroCliente">Número de Cliente:</label>
            <input type="text" name="numeroCliente" class="form-control" value="{{ old('numeroCliente') }}" required>
            @error('numeroCliente')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="datosFiscales">Datos Fiscales:</label>
            <input type="text" name="datosFiscales" class="form-control" value="{{ old('datosFiscales') }}" required>
            @error('datosFiscales')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Crear Cliente</button>
    </form>
</div>
@endsection
