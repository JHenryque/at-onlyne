<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    // um departamento para muito usuario
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
