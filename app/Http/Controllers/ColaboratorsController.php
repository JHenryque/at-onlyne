<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ColaboratorsController extends Controller
{
    // view home
    public function index(): View
    {
        return view('colaborators');
    }
}
