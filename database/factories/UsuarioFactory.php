<?php

namespace Database\Factories;

use App\Usuario;
use App\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'idRol' => Rol::factory(),
            'nombre' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Contraseña por defecto
            'activo' => true,
        ];
    }
}

