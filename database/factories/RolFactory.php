<?php

namespace Database\Factories;

use App\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolFactory extends Factory
{
    protected $model = Rol::class;

    public function definition()
    {
        return [
            'nombreRol' => $this->faker->randomElement(['Ventas', 'Compras', 'Almacén', 'Ruta']),
        ];
    }
}
