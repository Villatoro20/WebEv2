<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(['nombreRol' => 'Ventas']);
        Rol::create(['nombreRol' => 'Compras']);
        Rol::create(['nombreRol' => 'Almacén']);
        Rol::create(['nombreRol' => 'Ruta']);
    }
}

