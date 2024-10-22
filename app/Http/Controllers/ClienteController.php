<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Mostrar una lista de todos los clientes.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Mostrar el formulario para crear un nuevo cliente.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Almacenar un nuevo cliente en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'numeroCliente' => 'required|string|max:50|unique:clientes,numeroCliente',
            'datosFiscales' => 'required|string|max:255',
        ]);

        // Crear el cliente
        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    /**
     * Mostrar los detalles de un cliente específico.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Mostrar el formulario para editar un cliente existente.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Actualizar la información de un cliente en la base de datos.
     */
    public function update(Request $request, Cliente $cliente)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'numeroCliente' => 'required|string|max:50|unique:clientes,numeroCliente,' . $cliente->idCliente . ',idCliente',
            'datosFiscales' => 'required|string|max:255',
        ]);

        // Actualizar el cliente
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    /**
     * Eliminar un cliente de la base de datos (eliminación lógica o física).
     */
    public function destroy(Cliente $cliente)
    {
        // Eliminación lógica (si usas SoftDeletes)
        // $cliente->delete();

        // Eliminación física
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}


