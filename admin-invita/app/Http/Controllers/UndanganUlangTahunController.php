<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UndanganUlangTahunController extends Controller
{
    public function index()
    {
        $data = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->join('undangan_ulang_tahuns', 'undangans.id', '=', 'undangan_ulang_tahuns.id_undangan')
            ->select('orders.*', 'users.nama_user')
            ->get();

        // dd($data);

        return view('ulangtahun.index', [
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
            ->join('undangan_ulang_tahuns', 'undangans.id', '=', 'undangan_ulang_tahuns.id_undangan')
            ->select('undangans.*', 'undangan_ulang_tahuns.*')
            ->get();

        return view('ulangtahun.detail', [
            "undangan" => $undangan,
            "nama" => $nama,
            "data" => $data
        ]);
    }
}