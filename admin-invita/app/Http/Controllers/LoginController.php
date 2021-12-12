<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function masuk(Request $request)
    {
        $role = DB::table('users')->select('role_user')->where('email', $request['email'])->get();

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        // dd($role[0]);

        if ($role[0]->role_user == 'admin') {

            if (Auth::attempt(($credentials))) {
                $request->session()->regenerate();

                return redirect()->intended('/dashboard');
            }

            $request->session()->flash('gagal', 'Masuk ke akun gagal. Email atau password salah.');
            return back();
        } else if ($role[0]->role_user == 'user') {
            $request->session()->flash('dilarang', 'Akun bukan role admin.');
            return back();
        }

        $request->session()->flash('gagal', 'Masuk ke akun gagal. Email atau password salah.');
        return back();
    }

    public function keluar(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}