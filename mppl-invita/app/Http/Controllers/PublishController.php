<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tamu;

class PublishController extends Controller
{
    public function index_pernikahan($slug)
    {
        $undangan = DB::table('undangans')
            ->where('slug', '=', $slug)
            ->select('undangans.*')
            ->get();

        $detail = DB::table('undangan_pernikahans')
            ->select('undangan_pernikahans.*')
            ->where('id_undangan', '=', $undangan[0]->id)
            ->get();

        return view('order.pernikahan.publish', [
            'undangan' => $undangan,
            'detail' => $detail
        ]);
    }

    public function tamu_pernikahan(Request $request, $slug)
    {
        $undangan = DB::table('undangans')
            ->where('slug', '=', $slug)
            ->select('undangans.*')
            ->get();

        // dd($request);

        Tamu::create([
            'id_undangan' => $undangan[0]->id,
            'nama_tamu' => $request['nama_lengkap'],
            'telepon_tamu' => $request['telepon'],
            'kehadiran_tamu' => $request['kehadiran']
        ]);

        return redirect()->route('publish_pernikahan', [
            'slug' => $slug
        ])->with('tamusukses', 'Berhasil menambahkan data kehadiran.');
    }
}