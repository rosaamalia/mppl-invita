<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Harga Undangan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" />

    <!-- css -->
    <link rel="stylesheet" href="harga.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top" style="background-color: #0199ff; z-index: 99999">
      <div class="container d-flex">
        <a class="navbar-brand ms-0" href="index.html" style="font-size: 3.2rem"><strong>Invita.</strong>id</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav align-items-end mx-auto list" style="font-size: 2rem">
            <li class="nav-item pe-lg-5 pe-sm-2 pe-3 home">
              <div class="row">
                <a class="nav-link text-white" aria-current="page" href="index.html">Home</a>
              </div>
              <!-- <div class="row">
                <div class="line" style="background-color: white; width: 100%; height: 5px; border-radius: 8px"></div>
              </div> -->
            </li>
            <li class="nav-item pe-lg-5 pe-sm-2 pe-3 order">
              <div class="row">
                <a class="nav-link text-white order" href="#order">Order</a>
              </div>
              <div class="row">
                <div class="line" style="background-color: white; width: 100%; height: 5px; border-radius: 8px"></div>
              </div>
            </li>
            <li class="nav-item pe-lg-5 pe-sm-2 pe-3 portfolio">
              <div class="row">
                <a class="nav-link text-white portfolio" href="portfolio.html">Portfolio</a>
              </div>
              <!-- <div class="row">
                <div class="line" style="background-color: white; width: 100%; height: 5px; border-radius: 8px"></div>
              </div> -->
            </li>
            <li class="nav-item pe-lg-5 pe-sm-2 pe-3 blog">
              <div class="row">
                <a class="nav-link text-white blog" href="#blog">Blog</a>
              </div>
              <!-- <div class="row">
                <div class="line" style="background-color: white; width: 100%; height: 5px; border-radius: 8px"></div>
            </div> -->
            </li>
            <li class="nav-item pe-lg-5 pe-sm-2 pe-3 review">
              <div class="row">
                <a class="nav-link text-white review" href="#review">Review</a>
              </div>
              <!-- <div class="row">
                    <div class="line" style="background-color: white; width: 100%; height: 5px; border-radius: 8px"></div>
                </div> -->
            </li>
            <li class="nav-item pe-lg-5 pe-sm-2 pe-3 faq">
              <div class="row">
                <a class="nav-link text-white faq" href="#faq">FAQ</a>
              </div>
              <!-- <div class="row">
                  <div class="line" style="background-color: white; width: 100%; height: 5px; border-radius: 8px"></div>
                </div> -->
            </li>
            <!-- <div class="container animation start-home position-absolute"></div> -->
          </ul>
          <ul class="navbar-nav align-items-end text-white">
            <li class="nav-item pe-lg-2 pe-sm-0">
              <button class="btn fw-bold" style="font-size: 1.5rem">
                <a class="nav-link active" href="login.html">Masuk</a>
              </button>
            </li>
            <li class="nav-item pe-lg-2 pe-sm-0">
              <button class="btn btn-light fw-bold" style="font-size: 1.5rem">
                <a class="nav-link active" href="daftar.html" style="color: #0081d8">Daftar</a>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

    <!-- Harga -->
    <section class="harga">
      <div class="container">
        <div class="row text-center pt-5">
          <h1 style="font-size: 3rem; color: #044581"><strong class="fw-bold">Our </strong> Pricing</h1>
        </div>
        <div class="row fw-normal fs-4 text-center mb-5">
          <p>Penawaran terbaik untuk anda</p>
        </div>
        <div class="row row-harga justify-content-center">
          <div class="col-harga col-xxl-2 col-lg-3 col-sm-6 col-7 ps-0 pe-0 me-5 overflow-hidden" style="border-radius: 8px; box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px">
            <div class="row pt-5 text-center" style="background: rgb(34, 122, 255); background: linear-gradient(180deg, rgba(34, 122, 255, 1) 0%, rgba(95, 213, 251, 1) 100%)">
              <h2 class="text-white fw-bold">BASIC</h2>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,192L1440,96L1440,320L0,320Z"></path></svg>
            </div>

            <div class="row text-center">
              <h3>IDR <strong>195K</strong></h3>
            </div>
            <div class="row text-center" style="font-size: 1.2rem">
              <p>Pilih Jumlah Tamu</p>
            </div>
            <div class="row mx-auto w-75 mb-5" style="font-size: 1.5rem">
              <ul>
                <li>Countdown Timer</li>
                <li>Foto Cover</li>
                <li>Detail Jadwal Acara</li>
                <li>Google Maps</li>
                <li>Wedding Team</li>
                <li>Registry</li>
              </ul>
            </div>
            <div class="row justify-content-center mb-5" style="font-size: 1.5rem">
              <div class="col-5 p-0 m-0">
                <button
                  type="button"
                  class="btn border-0 pt-2 pb-2 text-white w-100 fs-3 fw-bolder"
                  style="border-radius: 10px; background: rgb(34, 122, 255); background: linear-gradient(180deg, rgba(34, 122, 255, 1) 0%, rgba(95, 213, 251, 1) 100%)"
                >
                  Get This
                </button>
              </div>
            </div>
          </div>
          <div
            class="col-harga col-xxl-2 col-lg-3 col-sm-6 col-7 ps-0 pe-0 me-5 overflow-hidden"
            style="
              border-radius: 8px;
              box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;
              background: rgb(34, 122, 255);
              background: linear-gradient(180deg, rgba(34, 122, 255, 1) 0%, rgba(95, 213, 251, 1) 100%);
            "
          >
            <div class="row bg-white pt-5 text-center" style="padding-bottom: 25px; border-radius: 0 0 100% 100%">
              <h2 class="fw-bold" style="color: rgb(34, 122, 255); color: linear-gradient(180deg, rgba(34, 122, 255, 1) 0%, rgba(95, 213, 251, 1) 100%)">PREMIUM</h2>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#ccc" fill-opacity="1" d="M0,128L120,149.3C240,171,480,213,720,213.3C960,213,1200,171,1320,149.3L1440,128L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path>
              </svg> -->
            </div>

            <div class="row text-center" style="padding-top: 25px">
              <h3>IDR <strong>195K</strong></h3>
            </div>
            <div class="row text-center" style="font-size: 1.2rem">
              <p>Undangan Unlimited</p>
            </div>
            <div class="row mx-auto w-75 mb-5" style="font-size: 1.5rem">
              <ul>
                <li>Countdown Timer</li>
                <li>Foto Cover</li>
                <li>Detail Jadwal Acara</li>
                <li>Google Maps</li>
                <li>Wedding Team</li>
                <li>Registry</li>
                <li>Premium Template</li>
                <li>Galeri Foto</li>
                <li>Wedding Story</li>
                <li>Wedding Video</li>
                <li>Bridesmaid and Bestmen</li>
                <li>Wedding Wish</li>
              </ul>
            </div>
            <div class="row justify-content-center mb-5" style="font-size: 1.5rem">
              <div class="col-5 p-0 m-0">
                <button
                  type="button"
                  class="btn border-0 pt-2 pb-2 text-white w-100 fs-3 fw-bolder"
                  style="border-radius: 10px; background: rgb(34, 122, 255); background: linear-gradient(180deg, rgba(34, 122, 255, 1) 0%, rgba(95, 213, 251, 1) 100%)"
                >
                  Get This
                </button>
              </div>
            </div>
          </div>
          <div class="col-harga col-xxl-2 col-lg-3 col-sm-6 col-7 ps-0 pe-0 me-5 overflow-hidden" style="border-radius: 8px; box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px">
            <div class="row pt-3 pb-0 text-center" style="background: rgb(34, 122, 255); background: linear-gradient(180deg, rgba(34, 122, 255, 1) 0%, rgba(95, 213, 251, 1) 100%)">
              <h2 class="text-white fw-bold">CHECK IN</h2>
              <h2 class="text-white">SYSTEM</h2>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,192L1440,96L1440,320L0,320Z"></path></svg>
            </div>

            <div class="row text-center" style="margin-top: -10px">
              <h3>IDR <strong>195K</strong></h3>
            </div>
            <div class="row text-center" style="font-size: 1.2rem">
              <p>Undangan Unlimited</p>
            </div>
            <div class="row mx-auto w-75 mb-5" style="font-size: 1.5rem">
              <ul>
                <li>Countdown Timer</li>
                <li>Foto Cover</li>
                <li>Detail Jadwal Acara</li>
                <li>Google Maps</li>
                <li>Wedding Team</li>
                <li>Registry</li>
                <li>Premium Template</li>
                <li>Galeri Foto</li>
                <li>Wedding Story</li>
                <li>Wedding Video</li>
                <li>Bridesmaid and Bestmen</li>
                <li>Wedding Wish</li>
                <li>QR Code Scanner</li>
                <li>Virtual Angpao</li>
                <li>Virtual Check-In</li>
                <li>Tablet & Printer</li>
              </ul>
            </div>
            <div class="row justify-content-center mb-5" style="font-size: 1.5rem">
              <div class="col-5 p-0 m-0">
                <button
                  type="button"
                  class="btn border-0 pt-2 pb-2 text-white w-100 fs-3 fw-bolder"
                  style="border-radius: 10px; background: rgb(34, 122, 255); background: linear-gradient(180deg, rgba(34, 122, 255, 1) 0%, rgba(95, 213, 251, 1) 100%)"
                >
                  Get This
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end harga -->

    <!-- diliput -->
    <div class="container-fluid diliput" style="margin-top: 75px; margin-bottom: 75px">
      <div class="row justify-content-center" style="margin-bottom: 50px">
        <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-5 col-sm-6 col-7 col-2 text-center">
          <h1 style="color: #044581">Telah diliput oleh</h1>
          <hr style="color: #044581; opacity: 1; border: 1px solid; border-radius: 5px" />
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-2 col-md-4 pt-5 text-center">
          <img class="img-fluid" src="img/techinasia.png" alt="" />
        </div>
        <div class="col-lg-2 col-md-4 pt-5 text-center">
          <img class="img-fluid" src="img/dailysocial.png" alt="" />
        </div>
        <div class="col-lg-2 col-md-4 pt-5 text-center">
          <img class="img-fluid" src="img/tribun.png" alt="" />
        </div>
        <div class="col-lg-2 col-md-4 pt-5 text-center">
          <img class="img-fluid" src="img/daaai.png" alt="" />
        </div>
        <div class="col-lg-2 col-md-4 pt-5 text-center">
          <img class="img-fluid" src="img/detik.png" alt="" />
        </div>
      </div>
    </div>
    <!-- end diliput -->

    <!-- footer -->
    @include('components/footer')
    <!-- end footer -->
  </body>
</html>
