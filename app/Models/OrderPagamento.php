<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPagamento extends Model
{
    //
    public function empreendedor()
    {
        return $this->hasOne(Empreendedor::class);
    }
}
