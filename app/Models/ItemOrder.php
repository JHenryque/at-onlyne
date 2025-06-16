<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemOrder extends Model
{
    //
    public function Empreendedor()
    {
        return $this->hasMany(Empreendedor::class);
    }
}
