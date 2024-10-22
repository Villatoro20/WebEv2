@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fotos</h1>
    <a href="{{ route('fotos.create') }}" class="btn btn-primary mb-3">Subir Nueva Foto</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pedido</th>
                <th>Foto</th>
                <th>Fecha de Subida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fotos as $foto)
            <tr>
                <td>{{ $foto->idFoto }}</td>
                <td>Pedido #{{ $foto->pedido->idPedido }}</td>
                <td>
                    <img src="{{ asset($foto->urlFoto) }}" alt="Foto del Pedido" class="img-fluid" style="max-width: 150px;">
                </td>
                <td>{{ $foto->fechaSubida }}</td>
                <td>
                    <a href="{{ route('fotos.show', $foto->idFoto) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('fotos.edit', $foto->idFoto) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('fotos.destroy', $foto->idFoto) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta foto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
