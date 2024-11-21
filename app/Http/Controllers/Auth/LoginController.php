<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;  // Memanggil Model User
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';  // Arahkan ke dashboard setelah login berhasil

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Pastikan user yang sudah login tidak bisa mengakses halaman login
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Mengambil kredensial yang digunakan untuk login, termasuk role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        // Pastikan role adalah 'admin'
        $user = User::where('email', $request->email)->first();

        // Cek apakah role pengguna adalah admin
        if ($user && $user->role == 'admin') {
            return [
                'email' => $request->email,
                'password' => $request->password,
            ];
        }

        return [];
    }

    // protected function resetPassword($user, $password)
    // {
    //     // Update password user
    //     $user->password = bcrypt($password);
    //     $user->setRememberToken(Str::random(60));

    //     // Simpan perubahan
    //     $user->save();

    //     // Tidak ada login otomatis di sini
    // }

    /**
     * Mengarahkan pengguna kembali ke halaman login jika login gagal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendFailedLoginResponse(Request $request)
    {

        // Jika login gagal karena alasan lainnya
        return redirect()->route('login')
            ->withErrors(['email' => 'Email atau kata sandi yang Anda masukkan tidak cocok.']);
    }
}
