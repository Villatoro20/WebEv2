@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Clientes</h1>
    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Crear Nuevo Cliente</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Número Cliente</th>
                <th>Datos Fiscales</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->idCliente }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->numeroCliente }}</td>
                <td>{{ $cliente->datosFiscales }}</td>
                <td>
                    <a href="{{ route('clientes.show', $cliente->idCliente) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('clientes.edit', $cliente->idCliente) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->idCliente) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
