<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mesa extends Model
{
     protected $fillable = [
        'numero_mesa','estado','id_usuario'
             ];
}
