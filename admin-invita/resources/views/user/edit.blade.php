
@extends('components.layout')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Pengguna Invita.id</h1>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/pengguna">Tabel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
  </ol>
</nav>

<form action="/pengguna/edit/{{ $data['id'] }}" method="POST" class="pt-3 px-5">
    @csrf
    <input type="hidden" name="id" value="{{ $data['id'] }}">
    <div class="row mb-3">
        <label for="nama-lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama-lengkap" name="nama-lengkap" value="{{ $data['nama_user'] }}">
            {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>
    <div class="row mb-3">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username" value="{{ $data['username'] }}">
            {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{ $data['email'] }}">
            {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row mb-3">
                <label for="tanggal-lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir" aria-describedby="nama-lengkap-help" value="{{ $data['tanggal_lahir_user'] }}">
                    {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row mb-3">
                <label for="jenis-kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="jenis-kelamin" name="jenis-kelamin" value="{{ $data['jenis_kelamin_user'] }}">
                    {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
        <div class="col-sm-10">
            <input type="telepon" class="form-control" id="telepon" name="telepon" value="{{ $data['telepon_user'] }}">
            {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Edit Data</button>
</form>

@endsection