<?php

namespace Database\Factories;

use App\Foto;
use App\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class FotoFactory extends Factory
{
    protected $model = Foto::class;

    public function definition()
    {
        return [
            'idPedido' => Pedido::factory(),
            'urlFoto' => 'fotos/' . $this->faker->image('public/fotos', 640, 480, null, false),
            'fechaSubida' => $this->faker->dateTime,
        ];
    }
}

