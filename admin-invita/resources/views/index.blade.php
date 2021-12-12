
@extends('components.layout')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Admin Dashboard</h1>
</div>

<h4>Data Tabel</h4>
<div class="row d-flex gap-3 mt-3 mx-1">
  <div class="card rounded shadow-sm" style="width: 20rem;">
    <div class="card-body"><img src="https://images.unsplash.com/photo-1544725121-be3bf52e2dc8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=867&q=80" alt="" class="img-fluid d-block mb-3" style="width: 100%; height: 120px; object-fit: cover">
      <h5> <a href="/pengguna" class="text-dark">Tabel Pengguna</a></h5>
      <p class="small text-muted font-italic">Lihat data tabel pengguna</p>
    </div>
  </div>
  <div class="card rounded shadow-sm" style="width: 20rem;">
    <div class="card-body"><img src="https://images.unsplash.com/photo-1625046584009-a6a8370c55f2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=666&q=80" alt="" class="img-fluid d-block mb-3" style="width: 100%; height: 120px; object-fit: cover">
      <h5> <a href="/order" class="text-dark">Tabel Order</a></h5>
      <p class="small text-muted font-italic">Lihat data tabel keseluruhan order undangan</p>
    </div>
  </div>
  <div class="card rounded shadow-sm" style="width: 20rem;">
    <div class="card-body"><img src="https://images.unsplash.com/photo-1550005809-91ad75fb315f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=869&q=80" alt="" class="img-fluid d-block mb-3" style="width: 100%; height: 120px; object-fit: cover">
      <h5> <a href="/pernikahan" class="text-dark">Undangan Pernikahan</a></h5>
      <p class="small text-muted font-italic">Lihat data tabel order undangan pernikahan.</p>
    </div>
  </div>
  <div class="card rounded shadow-sm" style="width: 20rem;">
    <div class="card-body"><img src="https://images.unsplash.com/photo-1531956531700-dc0ee0f1f9a5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="" class="img-fluid d-block mb-3" style="width: 100%; height: 120px; object-fit: cover">
      <h5> <a href="/ulang-tahun" class="text-dark">Undangan Ulang Tahun</a></h5>
      <p class="small text-muted font-italic">Lihat data tabel order undangan ulang tahun</p>
    </div>
  </div>
  <div class="card rounded shadow-sm" style="width: 20rem;">
    <div class="card-body"><img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="" class="img-fluid d-block mb-3" style="width: 100%; height: 120px; object-fit: cover">
      <h5> <a href="/lainnya" class="text-dark">Undangan Lainnya</a></h5>
      <p class="small text-muted font-italic">Lihat data tabel order undangan lainnya.</p>
    </div>
  </div>
</div>

@endsection