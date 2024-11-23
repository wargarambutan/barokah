<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah user sudah login
        if (Auth::check()) {
            // Cek apakah role user cocok dengan salah satu dari role yang diberikan
            if (in_array(Auth::user()->role, $roles)) {
                return $next($request); // Lanjutkan ke request berikutnya
            }

            // Jika user login tetapi tidak memiliki role yang sesuai, tampilkan 403 Forbidden
            abort(403, 'You do not have permission to access this resource.');
        }

        // Jika user belum login, redirect ke halaman login
        return redirect()->route('login');
    }
}
