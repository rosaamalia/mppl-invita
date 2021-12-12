<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\UndanganUlangTahun;
use App\Models\Undangan;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.order');
    }

    public function buat()
    {
        return view('order.buat');
    }

    public function buatUndangan(Request $request)
    {
        // dd($request[0]);
        $id_user = auth()->user()->id;
        $tanggal = date('Y-m-d');

        if ($request['jenis'] == 'basic') {
            $harga = 195000;
        } else {
            $harga = 2000000;
        }

        // dd($harga);
        $order = Order::create([
            'id_user' => $id_user,
            'total_harga' => $harga,
            'status_order' => 0
        ]);

        $undangan = Undangan::create([
            'id_jenis_undangan' => 2,
            'id_order' => $order->id,
            'tema_undangan' => $request['jenis'],
            'tanggal_mulai_acara' => $request['tanggal-mulai'],
            'tanggal_berakhir_acara' => $request['tanggal-berakhir'],
            'waktu_mulai_acara' => $request['waktu-mulai'],
            'waktu_berakhir_acara' => $request['waktu-berakhir'],
            'lokasi_acara' => $request['lokasi'],
            'alamat_acara' => $request['alamat']
        ]);

        $udangan_ulangtahun = UndanganUlangTahun::create([
            'id_undangan' => $undangan->id,
            'honorific_ulangtahun' => $request['honorific'],
            'nama_ulangtahun' => $request['nama-lengkap'],
            'tanggal_lahir_ulangtahun' => $request['tanggal-lahir'],
            'deskripsi_ulangtahun' => $request['deskripsi']
        ]);

        $request->session()->flash('sukses', 'Undangan berhasil dibuat!');
        return redirect('/order');
    }
}