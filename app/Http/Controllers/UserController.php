<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login()
    {
        return view('login.index');
    }

    public function show()
    {
        $data['userObj'] = $this->user->getAll(\auth()->id());

        return view('user_management.index', $data);
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $input['image'] = $this->uploadImage($request) ?? "";
        $validator = $this->userValidation($input, 'update');

        if(!empty($input['previous_password']) && !password_verify($input['previous_password'], Auth::user()->getAuthPassword())) {
            return redirect()->back()->withInput()->withErrors(["previous_password" => "Previous password did  not matched"]);
        }elseif ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        if(empty($input['password'])) {
            unset($input['_token'], $input['photo'], $input['previous_password'],$input['password'], $input['confirm_password']);
        } else {
            $input['password'] = Hash::make($input['password']);
            unset($input['_token'], $input['photo'], $input['previous_password'], $input['confirm_password']);
        }

        $this->user->updateByUserId(\auth()->id(), $input);

        return redirect()->back()->with(['success' => 'Updated Successfully']);
    }

    public function add(Request $request)
    {
        try {
            $input = $request->except('_token');

            if ($request->isMethod('POST')) {
                $validator = $this->userValidation($input);

                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator->errors());
                }

                $input['password'] = Hash::make($input['password']);
                $input['image'] = $this->uploadImage($request);
                $this->user->addNewUser($input);
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
            return redirect('/');
        }

        return redirect()->back()->withErrors('Invalid Username or Password!!!');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect(route('login'));
    }

    public function uploadImage($request)
    {
        if ($request->hasFile('photo')) {
            $filename = time() . '.' . $request->photo?->extension();
            $request->photo->move(public_path('assets/img/'), $filename);
            return $filename;
        }
    }

    public function userValidation($input, $from=null)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'sometimes|email',
            'username' => 'required|min:5|unique:users,username,' . \auth()->id(),
            'phone' => 'sometimes|min:11',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];

        if (!empty($from) && !empty($input['password']) && !empty($input['confirm_password'])) {
            $rules = [
                'name' => 'required|string',
                'email' => 'sometimes|email',
                'username' => 'required|min:5|unique:users,username,' . \auth()->id(),
                'phone' => 'sometimes|min:11',
                'password' => 'sometimes|min:6',
                'confirm_password' => 'sometimes|min:6|same:password',
            ];
        } elseif (!empty($from)) {
            $rules = [
                'name' => 'required|string',
                'email' => 'sometimes|email',
                'username' => 'required|min:5|unique:users,username,' . \auth()->id(),
                'phone' => 'sometimes|min:11',
            ];
        }

        $messages = [
            'confirm_password.same' => 'Password Confirmation should match the Password',
        ];

        return Validator::make($input, $rules, $messages);
    }
}
