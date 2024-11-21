<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login dan statusnya adalah admin
        if (Auth::check() && Auth::user()->status === 'admin') {
            return $next($request);  // Melanjutkan ke request berikutnya (route yang diminta)
        }

        // Jika bukan admin, redirect ke halaman lain (misalnya ke halaman home)
        return redirect()->route('login');  // Sesuaikan dengan route tujuan yang diinginkan
    }
}
