<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // page inicio profile
    public function index(): View
    {
        return view('user.profile');
    }

    // atualização da senha
    public function updatePassword(Request $request)
    {
        $request->validate([
             'current_password' => 'required|min:8|max:16',
             'new_password' => 'required|min:8|max:16|different:current_password',
             'new_password_confirmation' => 'required|same:new_password',
         ],
         [
             'current_password.required' => 'Campo Senha obrigatorio',
             'new_password.required' => 'Campo nova Senha obrigatorio',
             'new_password.different' => 'A nova senha tem de ser diferente do que a senha atual',
             'new_password_confirmation.required' => 'Campo Repetir a Senha obrigatorio',
             'new_password_confirmation.same' => 'A senha tem de ser igual a que a senha nova',
         ]);

         $user = auth()->user();

         //check if the current password is correct
         if (!password_verify($request->current_password, $user->password))
         {
             return redirect()->back()->with('error', 'Senha nova incorreta!');
         }

         $user->password = bcrypt($request->new_password);
         $user->save();
         return redirect()->back()->with('success', 'Senha alterada com sucesso!');
    }

    // atualização nome e email
    public function profileUserChangeData(Request $request)
    {
        // form validation
        $request->validate([
            'name' => 'required|min:16|max:255',
            'email' => 'required|email|max:255|unique:users,email,'. auth()->id(),
        ],
            [
                'name.required' => 'Campo Nome é obrigatorio',
                'email.required' => 'Campo E-mail é obrigatorio',

            ]);

        // update user data
        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success_change_data', 'Alterada Usuario com sucesso!');
    }
}
