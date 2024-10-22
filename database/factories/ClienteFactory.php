<?php

namespace Database\Factories;

use App\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'numeroCliente' => strtoupper(Str::random(8)),
            'datosFiscales' => $this->faker->bothify('RFC#########'),
        ];
    }
}

