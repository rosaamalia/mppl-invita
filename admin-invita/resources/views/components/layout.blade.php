<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin Dashboard | Invita.id</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    

    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
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

    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
  </head>

<body>   
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Invita.id</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/keluar" method="POST">
        @csrf
        <button type="submit" class="nav-link px-3" style="padding: 0; border: none; background: none;">Keluar</button>
      </form>
    </div>
  </div>
</header>

<div class="container-fluid pb-5">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link @if (Route::currentRouteName() == 'index') active @else null @endif" aria-current="page" href="/">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (Route::currentRouteName() == 'pengguna') active @else null @endif" href="/pengguna">
                <i class="bi bi-people" style="padding-right: 10px"></i>
              User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (Route::currentRouteName() == 'order') active @else null @endif" href="/order">
                <i class="bi bi-card-text" style="padding-right: 10px"></i>
              Order Keseluruhan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (Route::currentRouteName() == 'pernikahan') active @else null @endif" href="/pernikahan">
                <i class="bi bi-card-text" style="padding-right: 10px"></i>
              Undangan Pernikahan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (Route::currentRouteName() == 'ulang-tahun') active @else null @endif" href="/ulang-tahun">
                <i class="bi bi-card-text" style="padding-right: 10px"></i>
              Undangan Ulang Tahun
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if (Route::currentRouteName() == 'lainnya') active @else null @endif" href="/lainnya">
                <i class="bi bi-card-text" style="padding-right: 10px"></i>
              Undangan Lainnya
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      @yield('content')

    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="/js/dashboard.js"></script>
  </body>
</html>
