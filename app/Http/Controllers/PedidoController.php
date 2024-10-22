<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Cliente;
use App\Factura;
use App\Foto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Mostrar una lista de todos los pedidos.
     */
    public function index()
    {
        $pedidos = Pedido::with('cliente', 'factura', 'fotos')->orderBy('fechaPedido', 'desc')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Mostrar el formulario para crear un nuevo pedido.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('pedidos.create', compact('clientes'));
    }

    /**
     * Almacenar un nuevo pedido en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'idCliente' => 'required|exists:clientes,idCliente',
            'fechaPedido' => 'required|date',
            'estado' => 'required|in:Ordenado,En proceso,En ruta,Entregado',
            'direccionEntrega' => 'required|string|max:255',
            'notas' => 'nullable|string',
        ]);

        // Crear el pedido
        $pedido = Pedido::create($request->all());

        // Crear la factura asociada
        Factura::create([
            'idPedido' => $pedido->idPedido,
            'numeroFactura' => 'FAC-' . strtoupper(uniqid()),
            'fechaEmision' => now(),
            'montoTotal' => 0, // Puedes calcular esto más adelante
        ]);

        return redirect()->route('pedidos.index')->with('success', 'Pedido creado exitosamente.');
    }

    /**
     * Mostrar los detalles de un pedido específico.
     */
    public function show(Pedido $pedido)
    {
        $pedido->load('cliente', 'factura', 'fotos');
        return view('pedidos.show', compact('pedido'));
    }

    /**
     * Mostrar el formulario para editar un pedido existente.
     */
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        return view('pedidos.edit', compact('pedido', 'clientes'));
    }

    /**
     * Actualizar la información de un pedido en la base de datos.
     */
    public function update(Request $request, Pedido $pedido)
    {
        // Validar los datos del formulario
        $request->validate([
            'idCliente' => 'required|exists:clientes,idCliente',
            'fechaPedido' => 'required|date',
            'estado' => 'required|in:Ordenado,En proceso,En ruta,Entregado',
            'direccionEntrega' => 'required|string|max:255',
            'notas' => 'nullable|string',
        ]);

        // Actualizar el pedido
        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado exitosamente.');
    }

    /**
     * Eliminar un pedido de la base de datos (eliminación lógica o física).
     */
    public function destroy(Pedido $pedido)
    {
        // Eliminación lógica (si usas SoftDeletes)
        // $pedido->delete();

        // Eliminación física
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado exitosamente.');
    }

    /**
     * Cambiar el estado de un pedido.
     */
    public function changeStatus(Request $request, Pedido $pedido)
    {
        $request->validate([
            'estado' => 'required|in:Ordenado,En proceso,En ruta,Entregado',
        ]);

        $pedido->estado = $request->estado;
        $pedido->save();

        return redirect()->route('pedidos.index')->with('success', 'Estado del pedido actualizado exitosamente.');
    }

    /**
     * Subir una foto de entrega para un pedido.
     */
    public function uploadPhoto(Request $request, Pedido $pedido)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotos'), $imageName);

            // Guardar la ruta de la foto en la base de datos
            Foto::create([
                'idPedido' => $pedido->idPedido,
                'urlFoto' => 'fotos/' . $imageName,
                'fechaSubida' => now(),
            ]);

            return redirect()->route('pedidos.show', $pedido->idPedido)->with('success', 'Foto subida exitosamente.');
        }

        return back()->with('error', 'No se pudo subir la foto.');
    }
}
