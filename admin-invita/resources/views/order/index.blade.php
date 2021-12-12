
@extends('components.layout')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Order Keseluruhan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a class="btn btn-sm btn-outline-secondary" href="/order/tambah">Tambah Data</a>
    </div>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tabel</li>
    {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
  </ol>
</nav>

@if(session()->has('hapus'))
    <div class="row justify-content-center">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('hapus') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if(session()->has('edit'))
    <div class="row justify-content-center">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('edit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<div class="table-responsive">
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">User</th>
      <th scope="col">Tanggal Order</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Status Order</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0 ?>
      @foreach ($data as $item)
      <?php $i++ ?>
          
      <tr>
        <td>{{ $i }}</td>
        <td>{{ $item->nama_user }}</td>
        <td>{{ $item->tanggal_order }}</td>
        <td>{{ $item->total_harga }}</td>
        <td>@if($item->status_order == false) {{ 'Belum Dibayar' }} @else {{ 'Sudah Dibayar' }} @endif</td>
        <td>
          <div class="btn-group">
              <a type="button" class="btn btn-sm btn-warning" href="/order/edit/{{ $item->id }}">Edit</a>
              <form action="/order/hapus/" method="POST">
                @csrf
                <input name="id" value="{{ $item->id }}" type="hidden">
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah kamu ingin menghapus data ini?')">Hapus</button>
              </form>
          </div>
        </td>
      </tr>

      @endforeach
  </tbody>
</table>

@endsection