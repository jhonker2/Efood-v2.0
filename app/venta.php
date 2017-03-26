<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
     protected $fillable = [
        'id_persona','subtotal','iva12','totalpagado','fecha','iva0','num_factura12','num_factura0'
             ];
}
