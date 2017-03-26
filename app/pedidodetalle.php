<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedidodetalle extends Model
{
     protected $fillable = [
        'id_producto','id_pedido','cantidad','subtotal','pvp','detalle'
             ];
}
