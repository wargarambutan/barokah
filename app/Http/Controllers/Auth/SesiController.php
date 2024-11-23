<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'super_admin') {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            } elseif (Auth::user()->role == 'teknisi') {
                return redirect()->route('teknisi');
            }
        } else {
            return redirect('login')->withErrors('Email dan Password tidak valid');
        }
    }
}
