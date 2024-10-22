@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Cliente</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $cliente->nombre }}</h5>
            <p class="card-text"><strong>Número de Cliente:</strong> {{ $cliente->numeroCliente }}</p>
            <p class="card-text"><strong>Datos Fiscales:</strong> {{ $cliente->datosFiscales }}</p>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
