<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/');
        }

        return back()->with('error', 'Email atau password salah');
    }


    // ===== LOGOUT =====
    public function logout()
    {
        Auth::logout();

        return redirect('/admin/login');
    }
}