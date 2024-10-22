<?php

namespace Database\Factories;

use App\Pedido;
use App\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    protected $model = Pedido::class;

    public function definition()
    {
        return [
            'idCliente' => Cliente::factory(),
            'fechaPedido' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['Ordenado', 'En proceso', 'En ruta', 'Entregado']),
            'direccionEntrega' => $this->faker->address,
            'notas' => $this->faker->optional()->sentence,
        ];
    }
}

