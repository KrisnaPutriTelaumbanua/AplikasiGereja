<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index()
    {
        return view('content.auth.login');
    }

    public function verify(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $pesanError = 'Kombinasi Email dan Password Tidak ditemukan';
        $user = User::where('email', $request->email)
            ->where('is_active', 1)
            ->first();

        if ($user !== null) {
            if (password_verify($request->password, $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect('/admin');
            }

            return redirect()->back()->with('gagal', $pesanError);
        }
    }

    public function register()
    {
        return view('content.register.index');
    }

    public function registerProceed(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::query()->where('email', $email)->first();
        if ($user !== null) {
            return back()->with('gagal', 'Tidak mendaftar menggunakan email yang sama.');
        }
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->is_active = 0;
        $user->token_activation = md5($email . date('Y-m-dH:i:s'));
        $user->save();
        Mail::to($user->email)->send(new RegisterMail($user));
        return redirect('/login')->with('sukses', 'Registrasi Berhasil, cek email anda untuk aktivasi');
    }

    public function registerVerify($token)
    {
        $user = User::query()->where('token_activation', $token)->first();

        if ($user === null) {
            return redirect('/login')->with('gagal', 'Token tidak ditemukan');
        }

        $user->token_activation = null;
        $user->is_active = 1;
        $user->save();

        // Setelah aktivasi berhasil, arahkan ke halaman login dengan pesan sukses
        return redirect('/login')->with('sukses', 'Aktivasi Berhasil, anda sudah bisa login');
    }

}
