<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {
        $data = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.id_user')
            ->join('reviews', 'orders.id', '=', 'reviews.id_order')
            ->select('users.*', 'reviews.*')
            ->get();

        // dd($data);

        return view('review', [
            'data' => $data
        ]);
    }
}