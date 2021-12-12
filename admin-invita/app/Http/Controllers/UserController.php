<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', [
            "data" => User::all()
        ]);
    }

    public function tambah(Request $request)
    {
        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'nama_user' => $request['nama-lengkap'],
            'tanggal_lahir_user' => $request['tanggal-lahir'],
            'jenis_kelamin_user' => $request['jenis-kelamin'],
            'telepon_user' => $request['telepon']
        ]);

        $request->session()->flash('sukses', 'Data berhasil ditambah!');
        return redirect('/pengguna/tambah');
    }

    public function hapus()
    {
        $id = request()->id;
        User::where('id', $id)->delete();

        return redirect('/pengguna')->with('hapus', 'Data berhasil dihapus!');
    }

    public function edit(Request $request)
    {
        $data = User::find($request['id']);

        $data->update([
            'username' => $request['username'],
            'email' => $request['email'],
            'nama_user' => $request['nama-lengkap'],
            'tanggal_lahir_user' => $request['tanggal-lahir'],
            'jenis_kelamin_user' => $request['jenis-kelamin'],
            'telepon_user' => $request['telepon']
        ]);

        return redirect('/pengguna')->with('edit', 'Data berhasil diedit!');
    }
}