<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    //selecionar todos os departementos
    public function index()
    {
        Auth::user()->can('admin') ? : abort(403, 'Você não tem permissão para acessar esta página');

        $departments = Department::all();
        return view('department.departments', compact('departments'));
    }
}
