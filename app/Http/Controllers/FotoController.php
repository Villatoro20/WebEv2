<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Pedido;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Mostrar una lista de todas las fotos.
     */
    public function index()
    {
        $fotos = Foto::with('pedido')->get();
        return view('fotos.index', compact('fotos'));
    }

    /**
     * Mostrar el formulario para subir una nueva foto.
     */
    public function create()
    {
        $pedidos = Pedido::all();
        return view('fotos.create', compact('pedidos'));
    }

    /**
     * Almacenar una nueva foto en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'idPedido' => 'required|exists:pedidos,idPedido',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotos'), $imageName);

            // Guardar la foto en la base de datos
            Foto::create([
                'idPedido' => $request->idPedido,
                'urlFoto' => 'fotos/' . $imageName,
                'fechaSubida' => now(),
            ]);

            return redirect()->route('fotos.index')->with('success', 'Foto subida exitosamente.');
        }

        return back()->with('error', 'No se pudo subir la foto.');
    }

    /**
     * Mostrar los detalles de una foto específica.
     */
    public function show(Foto $foto)
    {
        $foto->load('pedido');
        return view('fotos.show', compact('foto'));
    }

    /**
     * Mostrar el formulario para editar una foto existente.
     */
    public function edit(Foto $foto)
    {
        $pedidos = Pedido::all();
        return view('fotos.edit', compact('foto', 'pedidos'));
    }

    /**
     * Actualizar la información de una foto en la base de datos.
     */
    public function update(Request $request, Foto $foto)
    {
        // Validar los datos del formulario
        $request->validate([
            'idPedido' => 'required|exists:pedidos,idPedido',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $foto->idPedido = $request->idPedido;

        if ($request->hasFile('foto')) {
            // Eliminar la foto anterior si existe
            if (file_exists(public_path($foto->urlFoto))) {
                unlink(public_path($foto->urlFoto));
            }

            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('fotos'), $imageName);
            $foto->urlFoto = 'fotos/' . $imageName;
            $foto->fechaSubida = now();
        }

        $foto->save();

        return redirect()->route('fotos.index')->with('success', 'Foto actualizada exitosamente.');
    }

    /**
     * Eliminar una foto de la base de datos.
     */
    public function destroy(Foto $foto)
    {
        // Eliminar el archivo de la foto
        if (file_exists(public_path($foto->urlFoto))) {
            unlink(public_path($foto->urlFoto));
        }

        // Eliminar el registro de la base de datos
        $foto->delete();

        return redirect()->route('fotos.index')->with('success', 'Foto eliminada exitosamente.');
    }
}

