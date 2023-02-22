<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Authentication extends Controller
{
    public function register(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email:dns',
            'password' => 'required|confirmed|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);

        // dd($validator->errors());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // dd($validator->validated());

        $validatedData = $validator->validated();

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect('/')->with('message', 'Account created, please login !');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $validatedData = $validator->validated();


        $checkAuth = Auth::attempt($validatedData);

        // dd($checkAuth);
        if ($checkAuth) {
            $request->session()->regenerate();

            return redirect()->to('admin');
        } else {
            return redirect()->back()->with('error', 'Login Failed !');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
