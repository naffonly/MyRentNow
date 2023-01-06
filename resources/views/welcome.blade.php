@extends('main.layouts.app')
@section('main-content')
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3  border-bottom">
    <a class="navbar-brand ms-3 text-dark" href="Landingpage.html" >
        <img src="{{ asset('img/logo.png') }}" alt="" width="30" height="24" class="d-inline-block align-text-top ms-5">
            RentNow</a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Katalog</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Blog</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">Tentang Kami</a></li>
      </ul>

      @if (Route::has('login'))
                <div class="top-right links me-3">
                    @auth
                        <a class="btn btn-info text-white"  style="border-radius: 1rem;" href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="btn btn-info text-white" style="border-radius: 1rem;"   href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-outline-info" style="border-radius: 1rem; "  href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </header>
    <main class="page landing-page">
        
        <section class="clean-block clean-hero bg-section mb-5" style="height: 60%;">
            <div class="text text-white container text-center" style="padding-top:150px; ">
                <h2 style="font-size: 48px;padding-bottom: 0px;margin-bottom: 0px;">Solusi Mahasiswa&nbsp;Untuk&nbsp;<br></h2>
                <h2 style="font-size: 48px;padding-bottom: 0px;">Menunjang Perkuliahan<br></h2><button class="btn btn-outline-light btn-lg" type="button" style="background: #4DD8E8;width: 249px;height: 50px;border-radius: 14px;font-size: 22px;font-weight: bold;">Sewa<br></button>
            </div>
        </section>
        <section class="d-xxl-flex justify-content-xxl-center clean-block features">
            <div class="container" style="margin-right: 0;margin-left: 0px;">
                <div class="block-heading"></div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h3 style="font-size: 30px;font-weight: bold;">Layanan Konsultasi Kami Adalah Yang Terbaik<br></h3>
                        <div class="getting-started-info">
                            <p style="font-size: 20px;">Customer tidak perlu khawatir tentang spesifikasi alat yang diperlukan untuk menyelesaikan perkerjaannya, kami menyediakan layanan konsultasi selama 24 jam.<br></p>
                        </div><button class="btn btn-outline-primary btn-lg" type="button" style="background: #4DD8E8;width: 240px;min-height: 45px;font-weight: bold;color: rgb(255,255,255);border-style: none;">Hubungi<br></button>
                    </div>
                    <div class="col-md-6"><img class="img-thumbnail" src="{{ asset('img/default.jpg') }}" style="border-radius: 47px;"></div>
                </div>
                <div class="row align-items-center" style="padding-top: 65px;">
                    <div class="col-md-6"><img class="img-thumbnail" src="{{ asset('img/default.jpg') }}" style="border-radius: 47px;"></div>
                    <div class="col-md-6">
                        <h3 style="font-size: 30px;font-weight: bold;">Kemudahan Dalam Mencari Alat Sesuai Kategori<br></h3>
                        <div class="getting-started-info">
                            <p style="font-size: 20px;">Kami menyediakan fitur pengkategorian alat sesuai jenis-jenis kebutuhan customer.<br></p>
                        </div><button class="btn btn-outline-primary btn-lg" type="button" style="background: #4DD8E8;width: 240px;min-height: 45px;font-weight: bold;color: rgb(255,255,255);border-style: none;">Hubungi<br></button>
                    </div>
                </div>
            </div>
        </section>
        <section class="clean-block features">
            <div class="container py-4 py-xl-5">
                <div class="row mb-5">
                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                        <h2 style="font-weight: bold;">Pertanyaan Populer<br></h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex p-3">
                            <div class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon sm" style="background: #4dd8e8;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h5 class="mb-0 mt-1">Bagaimana cara menyewa barang di RentNow?<br></h5>
                            </div>
                        </div>
                        <div class="d-flex p-3">
                            <div class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon sm" style="background: #4dd8e8;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg" style="background: #4dd8e8;">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h5 class="mb-0 mt-1">Apakah saya bisa order melalui media sosial?<br></h5>
                            </div>
                        </div>
                        <div class="d-flex p-3">
                            <div class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon sm" style="background: #4dd8e8;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg" style="background: #4dd8e8;">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h5 class="mb-0 mt-1">Bagaimana jika saya ingin mengembalikan barang lebih awal?<br></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex p-3">
                            <div class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon sm" style="background: #4dd8e8;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h5 class="mb-0 mt-1">Wilayah mana saja yang menjadi cakupan RentNow?<br></h5>
                            </div>
                        </div>
                        <div class="d-flex p-3">
                            <div class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon sm" style="background: #4dd8e8;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h5 class="mb-0 mt-1">Apakah barang dapat dimput sendiri?<br></h5>
                            </div>
                        </div>
                        <div class="d-flex p-3">
                            <div class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon sm" style="background: #4dd8e8;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-lg">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                                </svg></div>
                            <div class="px-2">
                                <h5 class="mb-0 mt-1">Apakah barang yang dikirimkan dalam keadaan bersih?<br></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 style="color: rgb(0,0,0);font-weight: bold;">Berita Terbaru<br></h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4" style="border-radius: 55px;width: 350px;">
                        <div class="card text-center clean-card" style="border-radius: 55px;"><img class="card-img-top w-100 d-block" src="{{ asset('img/default.jpg') }}" style="border-top-left-radius: 55px;border-top-right-radius: 55px;">
                            <div class="card-body info" style="box-shadow: 0px 1px 2px;border-bottom-right-radius: 55px;border-bottom-left-radius: 55px;">
                                <h4 class="card-title" style="text-align: left;font-size: 30px;">5 Spesifikasi Wajib di Smartphone Untuk Mainkan Game Grafis Berat<br></h4>
                                <div class="icons"><a href="#"><i class="material-icons">date_range</i></a>
                                    <p style="font-size: 18px;">10/12/2022</p>
                                </div>
                                <p class="card-text" style="text-align: left;font-size: 22px;">Untuk memainkan mobile game dengan grafis terbaik, gamer membutuhkan smartphone dengan spesifikasi dan fitur terbaik pula.<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4" style="border-radius: 55px;width: 350px;">
                        <div class="card text-center clean-card" style="border-radius: 55px;"><img class="card-img-top w-100 d-block" src="{{ asset('img/default.jpg') }}"  style="border-top-left-radius: 55px;border-top-right-radius: 55px;">
                            <div class="card-body info" style="box-shadow: 0px 1px 2px;border-bottom-right-radius: 55px;border-bottom-left-radius: 55px;">
                                <h4 class="card-title" style="text-align: left;font-size: 30px;">5 Spesifikasi Wajib di Smartphone Untuk Mainkan Game Grafis Berat<br></h4>
                                <div class="icons"><a href="#"><i class="material-icons">date_range</i></a>
                                    <p style="font-size: 18px;">10/12/2022</p>
                                </div>
                                <p class="card-text" style="text-align: left;font-size: 22px;">Untuk memainkan mobile game dengan grafis terbaik, gamer membutuhkan smartphone dengan spesifikasi dan fitur terbaik pula.<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4" style="border-radius: 55px;width: 350px;">
                        <div class="card text-center clean-card" style="border-radius: 55px;"><img class="card-img-top w-100 d-block" src="{{ asset('img/default.jpg') }}"  style="border-top-left-radius: 55px;border-top-right-radius: 55px;">
                            <div class="card-body info" style="box-shadow: 0px 1px 2px;border-bottom-right-radius: 55px;border-bottom-left-radius: 55px;">
                                <h4 class="card-title" style="text-align: left;font-size: 30px;">5 Spesifikasi Wajib di Smartphone Untuk Mainkan Game Grafis Berat<br></h4>
                                <div class="icons"><a href="#"><i class="material-icons">date_range</i></a>
                                    <p style="font-size: 18px;">10/12/2022</p>
                                </div>
                                <p class="card-text" style="text-align: left;font-size: 22px;">Untuk memainkan mobile game dengan grafis terbaik, gamer membutuhkan smartphone dengan spesifikasi dan fitur terbaik pula.<br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     
    </main>
    <br>
    <footer class="page-footer dark" style="background: #4DD8E8;">
        <div class="container py-4" >
            <div class="row" style="text-align: left;">
                <div class="col">
                    <h5>RentNow</h5>
                    <p style="color: rgb(255,255,255);">RentNow adalah tempat penyewaan barang kebutuhan mahasiswa seperti laptop, tablet, handphone dan kamera dengan tujuan untuk memberikan solusi terbaik bagi customer kami.<br></p>
                </div>
                <div class="col">
                    <h5>Hubungi Kami</h5>
                    <p style="color: rgb(255,255,255);">xxxxx@rentnow.com<br></p>
                </div>
                <div class="col">
                    <h5>Media Sosial Kami</h5>
                    <p style="color: rgb(255,255,255);">@rent_now</p>
                    <p style="color: rgb(255,255,255);">08123xxxxxx</p>
                </div>
                
            </div>
        </div>
    </footer>

    <!-- footer -->
    <footer>
        <p>2022 RentNow - All rights reserved</p>
      </footer>