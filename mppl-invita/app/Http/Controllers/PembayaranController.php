<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPembayaran;
use App\Models\Order;

class PembayaranController extends Controller
{
    public function pembayaran($id)
    {
        $id_user = auth()->user()->id;

        $data_ulangtahun = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->join('undangan_ulang_tahuns', 'undangans.id', '=', 'undangan_ulang_tahuns.id_undangan')
            ->select('orders.id', 'undangans.*', 'undangan_ulang_tahuns.*')
            ->where('undangans.id', '=', $id)
            ->where('users.id', '=', $id_user)
            ->get();

        $data_pernikahan = DB::table('orders')
            ->join('users', 'orders.id_user', '=', 'users.id')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->join('undangan_pernikahans', 'undangans.id', '=', 'undangan_pernikahans.id_undangan')
            ->select('orders.id', 'undangans.*', 'undangan_pernikahans.*')
            ->where('undangans.id', '=', $id)
            ->where('users.id', '=', $id_user)
            ->get();
        // dd($data_ulangtahun);

        return view('order.pembayaran', [
            'data_ulangtahun' => $data_ulangtahun,
            'data_pernikahan' => $data_pernikahan
        ]);
    }

    public function pembayaranUndangan(Request $request, $id)
    {
        $id_order = DB::table('orders')
            ->join('undangans', 'orders.id', '=', 'undangans.id_order')
            ->select('orders.id', 'undangans.id_jenis_undangan')
            ->where('undangans.id', '=', $id)
            ->get();

        // dd($id_order);

        $order = Order::find($id_order[0]->id);

        $order->update([
            'total_harga' => $request['harga'],
            'status_order' => 1
        ]);

        // dd($order);

        $data = new DetailPembayaran;
        $data->id_order = $id_order[0]->id;
        $data->metode_pembayaran = $request['metode-pembayaran'];
        $data->kode_kupon = $request['kupon'];
        $data->status_pembayaran = 1;
        $data->save();
        // dd($request);

        if ($id_order[0]->id_jenis_undangan == 1) {

            return redirect()->route('undangan_pernikahan', [
                'id' => $id
            ]);
        } else {
            return redirect()->route('undangan_ulangtahun', [
                'id' => $id
            ]);
        }
    }
}