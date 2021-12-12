<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin Invita.id</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

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
    <link href="/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

<main class="form-signin">
  
    @if(session()->has('gagal'))
    <div class="row justify-content-center">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('gagal') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    @endif

    @if(session()->has('dilarang'))
    <div class="row justify-content-center">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('dilarang') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
    @endif
    
    <h2 class="h3 mb-3 fw-normal">Invita.id</h2>
    <h2 class="h3 mb-3 fw-normal">Masuk sebagai Admin</h2>

  <form action="/masuk" method="POST">
    @csrf

    <div class="form-floating">
      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
    <p class="mt-5 mb-3 text-muted">&copy; Invita.id</p>
  </form>
</main>


    
  </body>
</html>
