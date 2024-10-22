@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Factura</h1>
    <form action="{{ route('facturas.update', $factura->idFactura) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="idPedido">Pedido:</label>
            <select name="idPedido" class="form-control" required>
                <option value="">Seleccione un pedido</option>
                @foreach($pedidos as $pedido)
                    <option value="{{ $pedido->idPedido }}" {{ old('idPedido', $factura->idPedido) == $pedido->idPedido ? 'selected' : '' }}>
                        Pedido #{{ $pedido->idPedido }} - Cliente: {{ $pedido->cliente->nombre }}
                    </option>
                @endforeach
            </select>
            @error('idPedido')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="numeroFactura">Número de Factura:</label>
            <input type="text" name="numeroFactura" class="form-control" value="{{ old('numeroFactura', $factura->numeroFactura) }}" required>
            @error('numeroFactura')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="fechaEmision">Fecha de Emisión:</label>
            <input type="date" name="fechaEmision" class="form-control" value="{{ old('fechaEmision', $factura->fechaEmision) }}" required>
            @error('fechaEmision')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="montoTotal">Monto Total:</label>
            <input type="number" step="0.01" name="montoTotal" class="form-control" value="{{ old('montoTotal', $factura->montoTotal) }}" required>
            @error('montoTotal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar Factura</button>
    </form>
</div>
@endsection
