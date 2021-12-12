
@extends('components.layout')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Order Undangan Ulang Tahun</h1>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tabel</li>
    {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
  </ol>
</nav>

<div class="table-responsive">
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">User</th>
      <th scope="col">Tanggal Order</th>
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
        <td>
          <div class="btn-group">
              <a type="button" class="btn btn-sm btn-primary" href="/ulang-tahun/detail/{{ $item->id }}">Detail</a>
          </div>
        </td>
      </tr>

      @endforeach
  </tbody>
</table>

@endsection