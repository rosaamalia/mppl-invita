<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UndanganLainnyaController extends Controller
{
    public function index()
    {
        $data = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->join('undangan_lainnyas', 'undangans.id', '=', 'undangan_lainnyas.id_undangan')
            ->select('orders.*', 'users.nama_user')
            ->get();

        // dd($data);

        return view('lainnya.index', [
            "data" => $data
        ]);
    }

    public function detail($id)
    {
        $undangan = DB::table('orders')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->where('orders.id', '=', $id)
            ->select('undangans.*')
            ->get();

        $nama = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->select('orders.*', 'users.nama_user')
            ->where('orders.id', '=', $id)
            ->get();

        $data = DB::table('undangans')
            ->join('undangan_lainnyas', 'undangans.id', '=', 'undangan_lainnyas.id_undangan')
            ->select('undangans.*', 'undangan_lainnyas.*')
            ->get();

        return view('lainnya.detail', [
            "undangan" => $undangan,
            "nama" => $nama,
            "data" => $data
        ]);
    }
}