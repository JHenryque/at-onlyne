<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empreendedor extends Model
{
    //

    public function tipoAtendimento()
    {
        return $this->belongsTo(TipoAtendimento::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }

    public function itemOrder()
    {
        return $this->hasMany(ItemOrder::class);
    }

    public function orderPagamento()
    {
        return $this->hasOne(OrderPagamento::class);
    }
}
