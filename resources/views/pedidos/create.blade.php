@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Pedido</h1>
    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="idCliente">Cliente:</label>
            <select name="idCliente" class="form-control" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->idCliente }}" {{ old('idCliente') == $cliente->idCliente ? 'selected' : '' }}>
                        {{ $cliente->nombre }}
                    </option>
                @endforeach
            </select>
            @error('idCliente')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="fechaPedido">Fecha del Pedido:</label>
            <input type="date" name="fechaPedido" class="form-control" value="{{ old('fechaPedido') }}" required>
            @error('fechaPedido')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" class="form-control" required>
                <option value="Ordenado" {{ old('estado') == 'Ordenado' ? 'selected' : '' }}>Ordenado</option>
                <option value="En proceso" {{ old('estado') == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="En ruta" {{ old('estado') == 'En ruta' ? 'selected' : '' }}>En ruta</option>
                <option value="Entregado" {{ old('estado') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
            </select>
            @error('estado')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="direccionEntrega">Dirección de Entrega:</label>
            <input type="text" name="direccionEntrega" class="form-control" value="{{ old('direccionEntrega') }}" required>
            @error('direccionEntrega')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="notas">Notas:</label>
            <textarea name="notas" class="form-control">{{ old('notas') }}</textarea>
            @error('notas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Crear Pedido</button>
    </form>
</div>
@endsection
