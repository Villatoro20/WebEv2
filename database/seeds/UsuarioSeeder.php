<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Usuario;
use App\Rol;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear usuarios para cada rol
        $roles = Rol::all();

        foreach ($roles as $rol) {
            Usuario::factory()->count(5)->create([
                'idRol' => $rol->idRol,
            ]);
        }

        // Crear un usuario administrador
        Usuario::create([
            'idRol' => $roles->where('nombreRol', 'Ventas')->first()->idRol,
            'nombre' => 'Administrador',
            'email' => 'admin@webev.com',
            'password' => bcrypt('adminpassword'),
            'activo' => true,
        ]);
    }
}

