@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Foto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Foto #{{ $foto->idFoto }}</h5>
            <p class="card-text"><strong>Pedido:</strong> Pedido #{{ $foto->pedido->idPedido }}</p>
            <p class="card-text"><strong>Fecha de Subida:</strong> {{ $foto->fechaSubida }}</p>
            <img src="{{ asset($foto->urlFoto) }}" alt="Foto del Pedido" class="img-fluid">
            <a href="{{ route('fotos.index') }}" class="btn btn-secondary mt-3">Volver</a>
        </div>
    </div>
</div>
@endsection
