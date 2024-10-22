<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['idCliente', 'fechaPedido', 'estado', 'direccionEntrega', 'notas'];

    // Relación: Un pedido pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

    // Relación: Un pedido tiene una factura
    public function factura()
    {
        return $this->hasOne(Factura::class, 'idPedido');
    }

    // Relación: Un pedido puede tener muchas fotos
    public function fotos()
    {
        return $this->hasMany(Foto::class, 'idPedido');
    }
}
