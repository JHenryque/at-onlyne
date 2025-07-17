<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ConfirmAccountController extends Controller
{
    public function confirmAccount($token)
    {
        // check if the token is valid
        $user = User::where('confirmation_token', $token)->first();

        if (!$user) {
            abort(404, 'Invalid confirmation token');
        }

        return view('auth.confirm-account', compact('user'));
    }
}
