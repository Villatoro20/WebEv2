@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-center">Panel Administrativo</h1>
    <div class="d-flex justify-content-around mt-4">
        <a href="{{ route('users.index') }}" class="btn btn-outline-primary">Gestión de Usuarios</a>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Gestión de Órdenes</a>
    </div>
@endsection
