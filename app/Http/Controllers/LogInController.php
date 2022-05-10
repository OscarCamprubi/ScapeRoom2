<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use MongoDB\Driver\Session;
use Symfony\Component\Console\Input\Input;

class LogInController
{
    public function welcome()
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('welcome')->with('user', $user);
        }
        return view('welcome');
    }

    public function login()
    {
        return view('login.login');
    }

    public function checkLogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return view('welcome')->with('user', User::find(Auth::id()));
        }
        return redirect('login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

}
