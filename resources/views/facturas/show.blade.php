@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Factura</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Factura #{{ $factura->numeroFactura }}</h5>
            <p class="card-text"><strong>Pedido:</strong> Pedido #{{ $factura->pedido->idPedido }}</p>
            <p class="card-text"><strong>Fecha de Emisión:</strong> {{ $factura->fechaEmision }}</p>
            <p class="card-text"><strong>Monto Total:</strong> ${{ number_format($factura->montoTotal, 2) }}</p>
            <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
