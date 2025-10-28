<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $r)
    {
        $r->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Cek mahasiswa
        $m = Mahasiswa::where('email', $r->email)->first();
        if ($m && Hash::check($r->password, $m->password)) {
            session(['role' => 'mahasiswa', 'user_nim' => $m->nim]);
            return redirect()->route('mahasiswa.dashboard');
        }

        // Cek dosen
        $d = Dosen::where('email', $r->email)->first();
        if ($d && Hash::check($r->password, $d->password)) {
            session(['role' => 'dosen', 'user_nip' => $d->nip]);
            return redirect()->route('dosen.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    // Logout
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
