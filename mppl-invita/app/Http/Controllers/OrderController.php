<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\UndanganUlangTahun;
use App\Models\Undangan;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;

        $data = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->join('undangan_ulang_tahuns', 'undangans.id', '=', 'undangan_ulang_tahuns.id_undangan')
            ->select('undangan_ulang_tahuns.*', 'undangans.id')
            ->where('users.id', '=', $id)
            ->get();

        return view('order.order', [
            'data' => $data
        ]);
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

    public function detail($id)
    {
        $undangan = DB::table('undangans')
            ->where('id', '=', $id)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_ulang_tahuns')
            ->select('undangan_ulang_tahuns.*')
            ->where('id_undangan', '=', $id)
            ->get();

        return view('order.undangan', [
            'undangan' => $undangan,
            'detail' => $detail
        ]);
    }

    public function edit($id)
    {
        $undangan = DB::table('undangans')
            ->where('id', '=', $id)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_ulang_tahuns')
            ->select('undangan_ulang_tahuns.*')
            ->where('id_undangan', '=', $id)
            ->get();

        return view('order.edit', [
            'undangan' => $undangan,
            'detail' => $detail
        ]);
    }

    public function editUndangan(Request $request, $id)
    {
        $undangan = Undangan::find($id);

        $undangan->update([
            'tanggal_mulai_acara' => $request['tanggal-mulai'],
            'tanggal_berakhir_acara' => $request['tanggal-berakhir'],
            'waktu_mulai_acara' => $request['waktu-mulai'],
            'waktu_berakhir_acara' => $request['waktu-berakhir'],
            'lokasi_acara' => $request['lokasi'],
            'alamat_acara' => $request['alamat']
        ]);

        UndanganUlangTahun::where('id_undangan', $id)->update([
            'honorific_ulangtahun' => $request['honorific'],
            'nama_ulangtahun' => $request['nama-lengkap'],
            'tanggal_lahir_ulangtahun' => $request['tanggal-lahir'],
            'deskripsi_ulangtahun' => $request['deskripsi']
        ]);

        $request->session()->flash('sukses', 'Undangan berhasil diperbarui!');
        return redirect()->route('undangan', [
            'id' => $id
        ]);
    }

    public function preview($id)
    {
        $undangan = DB::table('undangans')
            ->where('id', '=', $id)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_ulang_tahuns')
            ->select('undangan_ulang_tahuns.*')
            ->where('id_undangan', '=', $id)
            ->get();

        return view('order.preview', [
            'undangan' => $undangan,
            'detail' => $detail
        ]);
    }
}