<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventadetalle extends Model
{
   protected $fillable = [
        'id_venta','id_producto','cantidad','pvp','subtotal'
             ];
}
