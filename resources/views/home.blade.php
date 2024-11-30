@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="text-center">Consultar Estado de Orden</h1>
    <form method="GET" action="{{ route('orders.search') }}" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="invoice_number" class="form-label">Número de Factura:</label>
            <input type="text" class="form-control" id="invoice_number" name="invoice_number" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    @if(isset($order))
        <h3 class="mt-4">Estado de la Orden</h3>
        <p><strong>Estado:</strong> {{ $order->status }}</p>
        @if($order->status === 'Delivered')
            <img src="{{ asset('storage/' . $order->delivery_photo) }}" alt="Evidencia de entrega" class="img-fluid">
        @endif
    @endif
@endsection
