@extends('layouts.app')

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pedidos</h1>
    <a href="{{ route('pedidos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Pedido</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha Pedido</th>
                <th>Estado</th>
                <th>Dirección Entrega</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->idPedido }}</td>
                <td>{{ $pedido->cliente->nombre }}</td>
                <td>{{ $pedido->fechaPedido }}</td>
                <td>{{ $pedido->estado }}</td>
                <td>{{ $pedido->direccionEntrega }}</td>
                <td>
                    <a href="{{ route('pedidos.show', $pedido->idPedido) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('pedidos.edit', $pedido->idPedido) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('pedidos.destroy', $pedido->idPedido) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este pedido?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

