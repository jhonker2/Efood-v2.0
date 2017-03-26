<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{
   protected $fillable = [
        'id_mesa','id_usuario','subtotal','totalpagado','estado'
             ];
}
