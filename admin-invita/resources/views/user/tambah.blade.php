
@extends('components.layout')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Pengguna Invita.id</h1>
</div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/pengguna">Tabel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
  </ol>
</nav>

@if(session()->has('sukses'))
    <div class="row justify-content-center mx-5">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('sukses') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<form action="/pengguna/tambah" method="POST" class="pt-3 px-5">
    @csrf
    <div class="row mb-3">
        <label for="nama-lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama-lengkap" name="nama-lengkap">
            {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>
    <div class="row mb-3">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="username" name="username">
            {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email">
            {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>
    <div class="row mb-3">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password">
            {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row mb-3">
                <label for="tanggal-lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="tanggal-lahir" name="tanggal-lahir" aria-describedby="nama-lengkap-help">
                    {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row mb-3">
                <label for="jenis-kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="jenis-kelamin" name="jenis-kelamin">
                    {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
        <div class="col-sm-10">
            <input type="telepon" class="form-control" id="telepon" name="telepon">
            {{-- <div id="nama-lengkap-help" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Tambah</button>
</form>

@endsection