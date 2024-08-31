<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('Login.Login');
    }

    public function Login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],

            [
                'email.required' => 'Email Wajib Diisi',
                'password.required' => 'Password Wajib Diisi babi'
            ]
            );

            $infologin = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($infologin)) {
                return redirect('/dashboard');
            } else {
                return redirect('login')->withErrors('email dan password yang dimasukkan salah anjing!!!')->withInput();
            }   
    }

    public function Logout(){
        Auth::logout();
        return redirect('login');
    }
}
