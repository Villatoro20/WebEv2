@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Pedido</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pedido #{{ $pedido->idPedido }}</h5>
            <p class="card-text"><strong>Cliente:</strong> {{ $pedido->cliente->nombre }}</p>
            <p class="card-text"><strong>Fecha del Pedido:</strong> {{ $pedido->fechaPedido }}</p>
            <p class="card-text"><strong>Estado:</strong> {{ $pedido->estado }}</p>
            <p class="card-text"><strong>Dirección de Entrega:</strong> {{ $pedido->direccionEntrega }}</p>
            <p class="card-text"><strong>Notas:</strong> {{ $pedido->notas }}</p>

            <h5>Factura</h5>
            @if($pedido->factura)
                <p><strong>Número de Factura:</strong> {{ $pedido->factura->numeroFactura }}</p>
                <p><strong>Fecha de Emisión:</strong> {{ $pedido->factura->fechaEmision }}</p>
                <p><strong>Monto Total:</strong> ${{ number_format($pedido->factura->montoTotal, 2) }}</p>
            @else
                <p>No hay factura asociada.</p>
            @endif

            <h5>Fotos</h5>
            @if($pedido->fotos->count() > 0)
                @foreach($pedido->fotos as $foto)
                    <img src="{{ asset($foto->urlFoto) }}" alt="Foto del Pedido" class="img-fluid mb-2" style="max-width: 300px;">
                @endforeach
            @else
                <p>No hay fotos asociadas.</p>
            @endif

            @if($pedido->estado == 'En ruta' || $pedido->estado == 'Entregado')
                <a href="{{ route('pedidos.uploadPhoto', $pedido->idPedido) }}" class="btn btn-primary">Subir Foto de Entrega</a>
            @endif

            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
</div>
@endsection
