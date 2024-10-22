<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Mostrar una lista de todos los usuarios.
     */
    public function index()
    {
        $usuarios = Usuario::with('rol')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Mostrar el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        $roles = Rol::all();
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Almacenar un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:8|confirmed',
            'idRol' => 'required|exists:roles,idRol',
        ]);

        // Crear el usuario
        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'idRol' => $request->idRol,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Mostrar los detalles de un usuario específico.
     */
    public function show(Usuario $usuario)
    {
        $usuario->load('rol');
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Mostrar el formulario para editar un usuario existente.
     */
    public function edit(Usuario $usuario)
    {
        $roles = Rol::all();
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Actualizar la información de un usuario en la base de datos.
     */
    public function update(Request $request, Usuario $usuario)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->idUsuario . ',idUsuario',
            'password' => 'nullable|string|min:8|confirmed',
            'idRol' => 'required|exists:roles,idRol',
            'activo' => 'required|boolean',
        ]);

        // Actualizar el usuario
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->idRol = $request->idRol;
        $usuario->activo = $request->activo;
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Eliminar un usuario de la base de datos (eliminación lógica o física).
     */
    public function destroy(Usuario $usuario)
    {
        // Eliminación lógica (si usas SoftDeletes)
        // $usuario->delete();

        // Eliminación física
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
