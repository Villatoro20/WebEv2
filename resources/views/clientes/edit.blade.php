@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>
    <form action="{{ route('clientes.update', $cliente->idCliente) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre del Cliente:</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $cliente->nombre) }}" required>
            @error('nombre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="numeroCliente">Número de Cliente:</label>
            <input type="text" name="numeroCliente" class="form-control" value="{{ old('numeroCliente', $cliente->numeroCliente) }}" required>
            @error('numeroCliente')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="datosFiscales">Datos Fiscales:</label>
            <input type="text" name="datosFiscales" class="form-control" value="{{ old('datosFiscales', $cliente->datosFiscales) }}" required>
            @error('datosFiscales')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar Cliente</button>
    </form>
</div>
@endsection
