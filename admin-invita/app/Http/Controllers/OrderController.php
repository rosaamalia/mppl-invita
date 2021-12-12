<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Order;
use App\Models\UndanganPernikahan;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->select('orders.*', 'users.nama_user')
            ->get();

        // dd($data);

        return view('order.index', [
            "data" => $data
        ]);
    }

    public function tambah(Request $request)
    {
        $id = DB::table('users')->select('id')->where('nama_user', '=', $request['nama-lengkap'])->get();

        if ($request['status-order'] == 'Belum Dibayar') {
            $status = false;
        } else {
            $status = true;
        }

        // dd($id[0]);

        $data = new Order;
        $data->id_user = $id[0]->id;
        $data->tanggal_order = $request['tanggal-order'];
        $data->total_harga = $request['total-harga'];
        $data->status_order = $status;
        $data->save();

        $request->session()->flash('sukses', 'Data berhasil ditambah!');
        return redirect('/order/tambah');
    }

    public function hapus()
    {
        $id = request()->id;
        Order::where('id', $id)->delete();

        return redirect('/order')->with('hapus', 'Data berhasil dihapus!');
    }

    public function update($id)
    {
        $data = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->select('orders.*', 'users.nama_user')
            ->where('orders.id', '=', $id)
            ->get();

        // dd($data);

        return view('order.edit', [
            "data" => $data
        ]);
    }

    public function edit(Request $request)
    {
        // $data = Order::find($request['id']);
        $id = DB::table('users')->select('id')->where('nama_user', '=', $request['nama-lengkap'])->get();

        if ($request['status-order'] == 'Belum Dibayar') {
            $status = false;
        } else {
            $status = true;
        }

        Order::where('id', $request['id'])->delete();

        $data = new Order;
        $data->id_user = $id[0]->id;
        $data->tanggal_order = $request['tanggal-order'];
        $data->total_harga = $request['total-harga'];
        $data->status_order = $status;
        $data->save();

        return redirect('/order')->with('edit', 'Data berhasil diedit!');
    }
}