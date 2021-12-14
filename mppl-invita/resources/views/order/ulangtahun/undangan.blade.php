<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Undangan Saya | Invita.id</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" />

    <!-- css -->
    <link rel="stylesheet" href="/css/style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    @include('components.fonts')
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>

  <!-- navbar -->
  @include('components/navbar')
  <!-- end navbar -->

<main class="m-5 d-flex justify-content-center">

    <div class="card" style="width: 90%;">
        <img src="https://images.unsplash.com/photo-1531956531700-dc0ee0f1f9a5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" class="card-img-top d-block img-fluid" style="height: 200px; object-fit: cover">
        <div class="card-body d-flex flex-column justify-content-center align-items-center m-5">
            <p style="color: #0199FF; font-size: 24px; font-weight: 700">Ulang Tahun {{ $detail[0]->nama_ulangtahun }} 🎈</p>
            <p style="font-size: 20px;">Undangan Ulang Tahun</p>
            <p style="font-size: 16px">Tanggal: {{ $undangan[0]->tanggal_mulai_acara }}</p>
            <p style="font-size: 16px">Tempat: {{ $undangan[0]->lokasi_acara }}, {{ $undangan[0]->alamat_acara }}</p>
            <p style="font-size: 16px">Waktu: {{ $undangan[0]->waktu_mulai_acara }}</p>

            <hr class="m-5" style="border-top: 1px; border-color: #b3b3b3; border-style: solid; width: 100%">

            <p style="width: 70%; text-align: center; font-size: 16px">{{ $detail[0]->deskripsi_ulangtahun }}</p>

            <div class="row-12">
              @if ($pembayaran->isEmpty())
              <a href="/order/undangan/ulangtahun/{{ $undangan[0]->id }}/preview" class="btn btn-primary m-2 px-4 shadow border-0" style="background: white; color:#0199ff; font-size: 16px;">Preview</a>
                <a href="/order/undangan/pembayaran/{{ $undangan[0]->id }}" class="btn btn-primary m-2 px-4 shadow border-0" style="color: white; background:#0199ff;font-size: 16px;">Publish</a>
              @else
                @foreach($pembayaran as $item)
                @if ($item->status_pembayaran == 0)  
                <a href="/order/undangan/ulangtahun/{{ $undangan[0]->id }}/preview" class="btn btn-primary m-2 px-4 shadow border-0" style="background: white; color:#0199ff; font-size: 16px;">Preview</a>
                  <a href="/order/undangan/pembayaran/{{ $undangan[0]->id }}" class="btn btn-primary m-2 px-4 shadow border-0" style="color: white; background:#0199ff;font-size: 16px;">Publish</a>
                @else
                  <div class="row-12 d-flex flex-column justify-content-center">
                    <a href="#" class="btn btn-primary m-2 px-4 shadow border-0" style="color: white; background:#0199ff;font-size: 16px;">Lihat Undangan</a>
                    <p class="fs-4 mt-3">Tautan Undangan: <a href="#">inivita.id/{slug}</a></p>
                  </div>
                @endif
              @endforeach
              @endif
            </div>

            <hr class="m-5" style="border-top: 1px; border-color: #b3b3b3; border-style: solid; width: 100%">

            <div class="row gap-4">
                <div class="card justify-content-center" style="width: 18rem;">
                    <img src="/img/edit-data-undangan.png" class="card-img-top p-5" alt="..." style="height: 18rem; object-fit: cover">
                    <div class="card-body">
                      <a href="/order/undangan/ulangtahun/{{ $undangan[0]->id }}/edit" class="btn btn-primary shadow border-0" style="font-size: 14px; background:#0199ff;">Edit Data Undangan</a>
                    </div>
                  </div>
                  <div class="card d-flex justify-content-center" style="width: 18rem;">
                    <img src="/img/buku-tamu.png" class="card-img-top p-5" alt="..." style="height: 18rem; object-fit: cover">
                    <div class="card-body">
                      <a href="/order/bukutamu" class="btn btn-primary shadow border-0" style="font-size: 14px; background:#0199ff;">Laporan Buku Tamu</a>
                    </div>
                  </div>
            </div>
        </div>
      </div>

</main>

  <!-- footer -->
  @include('components/footer')
  <!-- end footer -->

      
  </body>
</html>

