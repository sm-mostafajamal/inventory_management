<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return view('login.index');
    }

    public function show(User $user)
    {
        $data['userObj'] = $user->getAll(\auth()->id());

        return view('user_management.index', $data);
    }

    public function update(Request $request, User $user)
    {
        $input = $request->except('_token');
        $user->updateByUserId(\auth()->id(), $input);
        return redirect()->back()->with(['success' => 'Updated Successfully']);
    }

    public function add(Request $request, User $user)
    {
        try {
            $input = $request->except('_token');

            if ($request->isMethod('POST')) {
                $rules = [
                    'name' => 'required|string',
                    'email' => 'sometimes|email',
                    'username' => 'required|min:6|unique:users,username',
                    'phone' => 'required|min:11',
                    'password' => 'required|min:4',
                    'confirm_password' => 'required|min:4|same:password',
                ];

                $messages = [
                    'confirm_password.same' => 'Password Confirmation should match the Password',
                ];

                $validator = Validator::make($input, $rules, $messages);

                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                }

                $input['password'] = Hash::make($input['password']);
                $user->addNewUser($input);
                return redirect()->back()->with(['success' => 'User Created Successfully']);

            }
        } catch (\Throwable $th) {
            $th->getMessage();
            return redirect()->back();
        }


        return view('user_management.add_user');

    }

    public function authentication(Request $request)
    {
        if (Auth::attempt($request->all(['username', 'password']))) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Logged In');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect(route('login'));
    }

}
