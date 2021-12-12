
@extends('components.layout')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Undangan Pernikahan</h1>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="/pernikahan">Tabel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Detail</li>
  </ol>
</nav>

<div class="table-responsive">
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">Kolom</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td>Nama Lengkap</td>
        <td>{{ $nama[0]->nama_user }}</td>
      </tr>
      <tr>
        <td>Jenis Undangan</td>
        <td>Undangan Pernikahan</td>
      </tr>
      <tr>
        <td>Status Order</td>
        <td>@if($nama[0]->status_order == false) {{ 'Belum Dibayar' }} @else {{ 'Sudah Dibayar' }} @endif</td>
      </tr>
      <tr>
        <td>Tema Undangan</td>
        <td>{{ $undangan[0]->tema_undangan }}</td>
      </tr>
      <tr>
        <td>Tanggal Acara</td>
        <td>{{ $undangan[0]->tanggal_mulai_acara }} - {{ $undangan[0]->tanggal_berakhir_acara }}</td>
      </tr>
      <tr>
        <td>Waktu Acara</td>
        <td>{{ $undangan[0]->waktu_mulai_acara }} - {{ $undangan[0]->waktu_berakhir_acara }}</td>
      </tr>
      <tr>
        <td>Lokasi Acara</td>
        <td>{{ $undangan[0]->lokasi_acara }}, {{ $undangan[0]->alamat_acara }}</td>
      </tr>
      <tr>
        <td>Mempelai Pria</td>
        <td>{{ $data[0]->honorific_mempelai_lk }}. {{ $data[0]->nama_mempelai_lk }}</td>
      </tr>
      <tr>
        <td>Orang Tua Mempelai Pria</td>
        <td>{{ $data[0]->orangtua_mempelai_lk }}</td>
      </tr>
      <tr>
        <td>Deskripsi Mempelai Pria</td>
        <td>{{ $data[0]->deskripsi_mempelai_lk }}</td>
      </tr>
      <tr>
        <td>Mempelai Wanita</td>
        <td>{{ $data[0]->honorific_mempelai_pr }}. {{ $data[0]->nama_mempelai_pr }}</td>
      </tr>
      <tr>
        <td>Orang Tua Mempelai Wanita</td>
        <td>{{ $data[0]->orangtua_mempelai_pr }}</td>
      </tr>
      <tr>
        <td>Deskripsi Mempelai Wanita</td>
        <td>{{ $data[0]->deskripsi_mempelai_pr }}</td>
      </tr>
  </tbody>
</table>

@endsection