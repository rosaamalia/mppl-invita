
@extends('components.layout')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Order Invita.id</h1>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/order">Tabel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
  </ol>
</nav>

<form action="/order/edit/{{ $data[0]->id }}" method="POST" class="pt-3 px-5">
    @csrf
    <input type="hidden" name="id" value="{{ $data[0]->id }}">
    <div class="row mb-3">
        <label for="nama-lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama-lengkap" name="nama-lengkap" value="{{ $data[0]->nama_user }}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="total-harga" class="col-sm-2 col-form-label">Total Harga</label>
        <div class="col-sm-10">
            <input type="numeric" class="form-control" id="total-harga" name="total-harga" value="{{ $data[0]->total_harga }}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row mb-3">
                <label for="tanggal-order" class="col-sm-4 col-form-label">Tanggal Order</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="tanggal-order" name="tanggal-order" value="{{ $data[0]->tanggal_order }}">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row mb-3">
                <label for="status-order" class="col-sm-4 col-form-label">Status Order</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="status-order" name="status-order" value="@if($data[0]->status_order == false) {{ 'Belum Dibayar' }} @else {{ 'Sudah Dibayar' }} @endif">
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Edit Data</button>
</form>

@endsection