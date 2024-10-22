<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'numeroCliente', 'datosFiscales'];

    // Relación: Un cliente puede tener muchos pedidos
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'idCliente');
    }
}
