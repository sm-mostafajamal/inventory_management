<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function authentication(Request $request)
    {
        if( Auth::attempt($request->all(['email_phone', 'password'])) )
        {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Logged In');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect(route('login'));
    }

}
