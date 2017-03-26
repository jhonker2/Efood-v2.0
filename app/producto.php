<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    protected $fillable = [
        'descripcion','precio','maneja_iva','cantidad','stock_minimo'
             ];
}
