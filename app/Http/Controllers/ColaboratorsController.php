<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ColaboratorsController extends Controller
{
    // view home
    public function index(): View
    {
        Auth::user()->can('admin') ? : abort(403, 'You are not allowed to access this page');

        $colaborators = User::where('role', 'assistente')->get();

        $departments = Department::where('role', '<>', 'admin')->get();
        return view('colaborators.colaborators', ['colaborators' => $colaborators]);
    }

    // caminha para view adiciona colaborador
    public function newColaborator(): View
    {
        Auth::user()->can('admin') ? : abort(403, 'You are not allowed to access this page');

        return view('colaborators.newColaborator');
    }

    // criar colabordor
    public function createColarator(Request $request){
        Auth::user()->can('admin') ? : abort(403, 'You are not allowed to access this page');

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'select_department'=>'required|exists:departments,id',
        ]);

        // create new rh use
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'rh';
        $user->department_id = $request->select_department;
        $user->permissions = 'role';
        $user->save();

        return redirect()->route('colaborators.colaborators').with('success', 'Colaborator created successfully');
    }
}
