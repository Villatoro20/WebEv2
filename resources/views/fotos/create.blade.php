@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Subir Nueva Foto</h1>
    <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="idPedido">Pedido:</label>
            <select name="idPedido" class="form-control" required>
                <option value="">Seleccione un pedido</option>
                @foreach($pedidos as $pedido)
                    <option value="{{ $pedido->idPedido }}" {{ old('idPedido') == $pedido->idPedido ? 'selected' : '' }}>
                        Pedido #{{ $pedido->idPedido }} - Cliente: {{ $pedido->cliente->nombre }}
                    </option>
                @endforeach
            </select>
            @error('idPedido')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" class="form-control-file" required>
            @error('foto')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Subir Foto</button>
    </form>
</div>
@endsection
