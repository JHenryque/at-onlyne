<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmAccountEmail;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ColaboratorsController extends Controller
{
    // view home
    public function index(): View
    {
        Auth::user()->can('admin') ? : abort(403, 'You are not allowed to access this page');

        $colaborators = User::where('role', '<>', 'admin')->get();


        return view('colaborators.colaborators', compact('colaborators'));
    }

    // caminha para view adiciona colaborador
    public function newColaborator(): View
    {
        Auth::user()->can('admin') ? : abort(403, 'You are not allowed to access this page');

        $departments = Department::where('name', '<>', 'admin')->where('name', '<>', 'cliente')->get();

        return view('colaborators.newColaborator', compact('departments'));
    }

    // criar colabordor
    public function createColarator(Request $request){
        Auth::user()->can('admin') ? : abort(403, 'You are not allowed to access this page');

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'select_department'=>'required|exists:departments,id',
        ]);

        // create user confirmation token
        $token = Str::random(60);

        // create new rh use
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->confirmation_token = $token;
        $user->department_id = $request->select_department;
        // resolvido
        $user->permissions = $user->department->name;
        $user->role = $user->permissions;
        $user->save();


        // send email to user
        Mail::to($user->email)->send(new ConfirmAccountEmail(route('confirm-account', $token)));

        return redirect()->route('colaborators')->with('success', 'Colaborador cadastrado com sucesso!');
    }
}
