<?php

namespace Database\Factories;

use App\Factura;
use App\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    protected $model = Factura::class;

    public function definition()
    {
        return [
            'idPedido' => Pedido::factory(),
            'numeroFactura' => 'FAC-' . strtoupper(Str::random(8)),
            'fechaEmision' => $this->faker->date(),
            'montoTotal' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}

