@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Facturas</h1>
    <a href="{{ route('facturas.create') }}" class="btn btn-primary mb-3">Crear Nueva Factura</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número Factura</th>
                <th>Pedido</th>
                <th>Fecha Emisión</th>
                <th>Monto Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facturas as $factura)
            <tr>
                <td>{{ $factura->idFactura }}</td>
                <td>{{ $factura->numeroFactura }}</td>
                <td>Pedido #{{ $factura->pedido->idPedido }}</td>
                <td>{{ $factura->fechaEmision }}</td>
                <td>${{ number_format($factura->montoTotal, 2) }}</td>
                <td>
                    <a href="{{ route('facturas.show', $factura->idFactura) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('facturas.edit', $factura->idFactura) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('facturas.destroy', $factura->idFactura) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta factura?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
