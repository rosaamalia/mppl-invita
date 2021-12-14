<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\UndanganUlangTahun;
use App\Models\Undangan;
use App\Models\Review;
use App\Models\UndanganPernikahan;
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

        $data_pernikahan = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->join('undangan_pernikahans', 'undangans.id', '=', 'undangan_pernikahans.id_undangan')
            ->select('undangan_pernikahans.*', 'undangans.id')
            ->where('users.id', '=', $id)
            ->get();

        // dd($data);

        return view('order.order', [
            'data' => $data,
            'data_pernikahan' => $data_pernikahan
        ]);
    }

    public function buatUlangTahun()
    {
        return view('order.ulangtahun.buat');
    }

    public function buatUndanganUlangTahun(Request $request)
    {
        // dd($request[0]);
        $id_user = auth()->user()->id;
        $tanggal = date('Y-m-d');

        if ($request['jenis'] == 'basic') {
            $harga = 195000;
        } else {
            $harga = 2000000;
        }

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $slug = substr(str_shuffle($permitted_chars), 0, 10);

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
            'alamat_acara' => $request['alamat'],
            'slug' => $slug
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

    public function detailUlangTahun($id)
    {
        $undangan = DB::table('undangans')
            ->where('id', '=', $id)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_ulang_tahuns')
            ->select('undangan_ulang_tahuns.*')
            ->where('id_undangan', '=', $id)
            ->get();

        $id_order = DB::table('orders')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->select('orders.id')
            ->where('undangans.id', '=', $id)
            ->get();

        $data_pembayaran = DB::table('orders')
            ->join('detail_pembayarans', 'orders.id', '=', 'detail_pembayarans.id_order')
            ->select('detail_pembayarans.*')
            ->where('detail_pembayarans.id_order', '=', $id_order[0]->id)
            ->get();

        return view('order.ulangtahun.undangan', [
            'undangan' => $undangan,
            'detail' => $detail,
            'pembayaran' => $data_pembayaran
        ]);
    }

    public function editUlangTahun($id)
    {
        $undangan = DB::table('undangans')
            ->where('id', '=', $id)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_ulang_tahuns')
            ->select('undangan_ulang_tahuns.*')
            ->where('id_undangan', '=', $id)
            ->get();

        return view('order.ulangtahun.edit', [
            'undangan' => $undangan,
            'detail' => $detail
        ]);
    }

    public function editUndanganUlangTahun(Request $request, $id)
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
        return redirect()->route('undangan_ulangtahun', [
            'id' => $id
        ]);
    }

    public function previewUlangTahun($id)
    {
        $undangan = DB::table('undangans')
            ->where('id', '=', $id)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_ulang_tahuns')
            ->select('undangan_ulang_tahuns.*')
            ->where('id_undangan', '=', $id)
            ->get();

        return view('order.ulangtahun.preview', [
            'undangan' => $undangan,
            'detail' => $detail
        ]);
    }

    public function reviewUlangTahun($id)
    {
        $data = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->join('undangan_ulang_tahuns', 'undangans.id', '=', 'undangan_ulang_tahuns.id_undangan')
            ->select('undangan_ulang_tahuns.*')
            ->where('undangans.id', '=', $id)
            ->get();

        return view('order.ulangtahun.review', [
            'data' => $data
        ]);
    }

    public function reviewUndanganUlangTahun(Request $request, $id)
    {
        $id_order = Undangan::where('id', $id)->select('id_order')->get();
        // dd($request);
        $data = Review::create([
            'id_order' => $id_order[0]->id_order,
            'nama_user_review' => $request['nama_lengkap'],
            'isi_review' => $request['review'],
            'rating' => $request['star']
        ]);

        return redirect('/review');
    }

    // pernikahan
    public function buatPernikahan()
    {
        return view('order.pernikahan.buat');
    }

    public function buatUndanganPernikahan(Request $request)
    {
        // dd($request[0]);
        $id_user = auth()->user()->id;
        $tanggal = date('Y-m-d');

        if ($request['jenis'] == 'basic') {
            $harga = 195000;
        } else {
            $harga = 2000000;
        }

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $slug = substr(str_shuffle($permitted_chars), 0, 10);

        // dd($harga);
        $order = Order::create([
            'id_user' => $id_user,
            'total_harga' => $harga,
            'status_order' => 0
        ]);

        $undangan = Undangan::create([
            'id_jenis_undangan' => 1,
            'id_order' => $order->id,
            'tema_undangan' => $request['jenis'],
            'tanggal_mulai_acara' => $request['tanggal-mulai'],
            'tanggal_berakhir_acara' => $request['tanggal-berakhir'],
            'waktu_mulai_acara' => $request['waktu-mulai'],
            'waktu_berakhir_acara' => $request['waktu-berakhir'],
            'lokasi_acara' => $request['lokasi'],
            'alamat_acara' => $request['alamat'],
            'slug' => $slug
        ]);

        $udangan_pernikahan = UndanganPernikahan::create([
            'id_undangan' => $undangan->id,
            'honorific_mempelai_lk' => $request['honorific-lk'],
            'nama_mempelai_lk' => $request['nama-lengkap-lk'],
            'orangtua_mempelai_lk' => $request['orangtua-lk'],
            'deskripsi_mempelai_lk' => $request['deskripsi-lk'],
            'honorific_mempelai_pr' => $request['honorific-pr'],
            'nama_mempelai_pr' => $request['nama-lengkap-pr'],
            'orangtua_mempelai_pr' => $request['orangtua-pr'],
            'deskripsi_mempelai_pr' => $request['deskripsi-pr']
        ]);

        $request->session()->flash('sukses', 'Undangan berhasil dibuat!');
        return redirect('/order');
    }

    public function detailPernikahan($id)
    {
        $undangan = DB::table('undangans')
            ->where('id', '=', $id)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_pernikahans')
            ->select('undangan_pernikahans.*')
            ->where('id_undangan', '=', $id)
            ->get();

        $id_order = DB::table('orders')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->select('orders.id')
            ->where('undangans.id', '=', $id)
            ->get();

        $data_pembayaran = DB::table('orders')
            ->join('detail_pembayarans', 'orders.id', '=', 'detail_pembayarans.id_order')
            ->select('detail_pembayarans.*')
            ->where('detail_pembayarans.id_order', '=', $id_order[0]->id)
            ->get();

        return view('order.pernikahan.undangan', [
            'undangan' => $undangan,
            'detail' => $detail,
            'pembayaran' => $data_pembayaran
        ]);
    }

    public function editPernikahan($id)
    {
        $undangan = DB::table('undangans')
            ->where('id', '=', $id)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_pernikahans')
            ->select('undangan_pernikahans.*')
            ->where('id_undangan', '=', $id)
            ->get();

        return view('order.pernikahan.edit', [
            'undangan' => $undangan,
            'detail' => $detail
        ]);
    }

    public function editUndanganPernikahan(Request $request, $id)
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

        UndanganPernikahan::where('id_undangan', $id)->update([
            'honorific_mempelai_lk' => $request['honorific-lk'],
            'nama_mempelai_lk' => $request['nama-lengkap-lk'],
            'orangtua_mempelai_lk' => $request['orangtua-lk'],
            'deskripsi_mempelai_lk' => $request['deskripsi-lk'],
            'honorific_mempelai_pr' => $request['honorific-pr'],
            'nama_mempelai_pr' => $request['nama-lengkap-pr'],
            'orangtua_mempelai_pr' => $request['orangtua-pr'],
            'deskripsi_mempelai_pr' => $request['deskripsi-pr']
        ]);

        $request->session()->flash('sukses', 'Undangan berhasil diperbarui!');
        return redirect()->route('undangan_pernikahan', [
            'id' => $id
        ]);
    }

    public function reviewPernikahan($id)
    {
        $data = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->join('undangan_pernikahans', 'undangans.id', '=', 'undangan_pernikahans.id_undangan')
            ->select('undangan_pernikahans.*')
            ->where('undangans.id', '=', $id)
            ->get();

        return view('order.pernikahan.review', [
            'data' => $data
        ]);
    }

    public function reviewUndanganPernikahan(Request $request, $id)
    {
        $id_order = Undangan::where('id', $id)->select('id_order')->get();
        // dd($request);
        $data = Review::create([
            'id_order' => $id_order[0]->id_order,
            'nama_user_review' => $request['nama_lengkap'],
            'isi_review' => $request['review'],
            'rating' => $request['star']
        ]);

        return redirect('/review');
    }

    public function previewPernikahan($id)
    {
        $undangan = DB::table('undangans')
            ->where('id', '=', $id)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_pernikahans')
            ->select('undangan_pernikahans.*')
            ->where('id_undangan', '=', $id)
            ->get();

        return view('order.pernikahan.preview', [
            'undangan' => $undangan,
            'detail' => $detail
        ]);
    }

    public function tamuPernikahan($id)
    {
        $data = DB::table('tamus')
            ->join('undangans', 'tamus.id_undangan', '=', 'undangans.id')
            ->select('tamus.*')
            ->where('undangans.id', '=', $id)
            ->get();

        return view('order.pernikahan.bukutamu', [
            'data' => $data,
            'id' => $id
        ]);
    }

    public function tamuUlangTahun($id)
    {
        $data = DB::table('tamus')
            ->join('undangans', 'tamus.id_undangan', '=', 'undangans.id')
            ->select('tamus.*')
            ->where('undangans.id', '=', $id)
            ->get();

        return view('order.ulangtahun.bukutamu', [
            'data' => $data,
            'id' => $id
        ]);
    }
}