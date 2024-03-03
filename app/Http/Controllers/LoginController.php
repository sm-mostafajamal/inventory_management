<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index( Request $request )
    {
        $this->authentication($request);

        return view('login.index');
    }

    public function authentication($request)
    {
        if( Auth::attempt($request->all(['email_phone', 'password'])) )
        {
            $request->session()->regenerate();
            return redirect(route('home'))->with('success', 'Logged In');
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
