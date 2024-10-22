<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Pedido;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Mostrar una lista de todas las facturas.
     */
    public function index()
    {
        $facturas = Factura::with('pedido')->orderBy('fechaEmision', 'desc')->get();
        return view('facturas.index', compact('facturas'));
    }

    /**
     * Mostrar el formulario para crear una nueva factura.
     */
    public function create()
    {
        $pedidos = Pedido::whereDoesntHave('factura')->get();
        return view('facturas.create', compact('pedidos'));
    }

    /**
     * Almacenar una nueva factura en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'idPedido' => 'required|exists:pedidos,idPedido|unique:facturas,idPedido',
            'numeroFactura' => 'required|string|max:50|unique:facturas,numeroFactura',
            'fechaEmision' => 'required|date',
            'montoTotal' => 'required|numeric|min:0',
        ]);

        // Crear la factura
        Factura::create($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura creada exitosamente.');
    }

    /**
     * Mostrar los detalles de una factura específica.
     */
    public function show(Factura $factura)
    {
        $factura->load('pedido');
        return view('facturas.show', compact('factura'));
    }

    /**
     * Mostrar el formulario para editar una factura existente.
     */
    public function edit(Factura $factura)
    {
        $pedidos = Pedido::whereDoesntHave('factura')->orWhere('idPedido', $factura->idPedido)->get();
        return view('facturas.edit', compact('factura', 'pedidos'));
    }

    /**
     * Actualizar la información de una factura en la base de datos.
     */
    public function update(Request $request, Factura $factura)
    {
        // Validar los datos del formulario
        $request->validate([
            'idPedido' => 'required|exists:pedidos,idPedido|unique:facturas,idPedido,' . $factura->idFactura . ',idFactura',
            'numeroFactura' => 'required|string|max:50|unique:facturas,numeroFactura,' . $factura->idFactura . ',idFactura',
            'fechaEmision' => 'required|date',
            'montoTotal' => 'required|numeric|min:0',
        ]);

        // Actualizar la factura
        $factura->update($request->all());

        return redirect()->route('facturas.index')->with('success', 'Factura actualizada exitosamente.');
    }

    /**
     * Eliminar una factura de la base de datos (eliminación lógica o física).
     */
    public function destroy(Factura $factura)
    {
        // Eliminación lógica (si usas SoftDeletes)
        // $factura->delete();

        // Eliminación física
        $factura->delete();

        return redirect()->route('facturas.index')->with('success', 'Factura eliminada exitosamente.');
    }
}
