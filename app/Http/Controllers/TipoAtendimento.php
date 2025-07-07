<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TipoAtendimento extends Controller
{
    //
    public function index():View
    {
        return view('atendimento.tipo-atendimento');
    }
}
