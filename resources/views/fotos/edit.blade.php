@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Foto</h1>
    <form action="{{ route('fotos.update', $foto->idFoto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="idPedido">Pedido:</label>
            <select name="idPedido" class="form-control" required>
                <option value="">Seleccione un pedido</option>
                @foreach($pedidos as $pedido)
                    <option value="{{ $pedido->idPedido }}" {{ old('idPedido', $foto->idPedido) == $pedido->idPedido ? 'selected' : '' }}>
                        Pedido #{{ $pedido->idPedido }} - Cliente: {{ $pedido->cliente->nombre }}
                    </option>
                @endforeach
            </select>
            @error('idPedido')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="foto">Foto (dejar en blanco para no cambiar):</label>
            <input type="file" name="foto" class="form-control-file">
            @error('foto')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar Foto</button>
    </form>
</div>
@endsection
