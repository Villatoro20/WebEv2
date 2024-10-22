<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Mostrar una lista de todos los roles.
     */
    public function index()
    {
        $roles = Rol::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Mostrar el formulario para crear un nuevo rol.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Almacenar un nuevo rol en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombreRol' => 'required|string|max:255|unique:roles,nombreRol',
        ]);

        // Crear el rol
        Rol::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    /**
     * Mostrar los detalles de un rol específico.
     */
    public function show(Rol $rol)
    {
        return view('roles.show', compact('rol'));
    }

    /**
     * Mostrar el formulario para editar un rol existente.
     */
    public function edit(Rol $rol)
    {
        return view('roles.edit', compact('rol'));
    }

    /**
     * Actualizar la información de un rol en la base de datos.
     */
    public function update(Request $request, Rol $rol)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombreRol' => 'required|string|max:255|unique:roles,nombreRol,' . $rol->idRol . ',idRol',
        ]);

        // Actualizar el rol
        $rol->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente.');
    }

    /**
     * Eliminar un rol de la base de datos (eliminación lógica o física).
     */
    public function destroy(Rol $rol)
    {
        // Verificar si hay usuarios asociados al rol
        if ($rol->usuarios()->count() > 0) {
            return redirect()->route('roles.index')->with('error', 'No se puede eliminar el rol porque tiene usuarios asociados.');
        }

        // Eliminación física
        $rol->delete();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente.');
    }
}
