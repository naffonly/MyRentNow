@extends('main.layouts.app')
@section('main-content')
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3  border-bottom">
    <a class="navbar-brand ms-3 text-dark" href="{{ route('landing') }}" >
        <img src="{{ asset('img/logo.png') }}" alt="" width="30" height="24" class="d-inline-block align-text-top ms-5">
            RentNow</a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ route('katalog') }}" class="nav-link px-2 link-secondary">Katalog</a></li>
        <li><a href="{{ route('listBlog') }}" class="nav-link px-2 link-dark">Blog</a></li>
        <li><a href="{{ route('about') }}" class="nav-link px-2 link-dark">Tentang Kami</a></li>
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
        
        <section class="justify-content-center bg-section mb-5" style="height: 80%;">
            <div class="container  d-flex align-items-center">
                <div class="container text-center text text-white ">
                <h2 style="font-size: 48px;">Solusi Mahasiswa&nbsp;Untuk&nbsp;<br></h2>
                <h2 style="font-size: 48px;">Menunjang Perkuliahan<br></h2><a href="{{ route('katalog') }}" class="btn btn-outline-light btn-lg" type="button" style="background: #4DD8E8;width: 249px;height: 50px;border-radius: 14px;font-size: 22px;font-weight: bold;">Sewa<br></a>
            </div>
        </div>
        </section>
        <section class="d-xxl-flex justify-content-center  features">
            <div class="container justify-content-center" style="margin-right: 0;margin-left: 0px;">
                <div class="block-heading"></div>
                <div class="row align-items-center ">
                    <div class="col-md-6 mb-5 ">
                        <h3 style="font-size: 30px;font-weight: bold;">Layanan Konsultasi Kami Adalah Yang Terbaik<br></h3>
                        <div class="getting-started-info">
                            <p style="font-size: 20px;">Customer tidak perlu khawatir tentang spesifikasi alat yang diperlukan untuk menyelesaikan perkerjaannya, kami menyediakan layanan konsultasi selama 24 jam.<br></p>
                        </div><a target="_blank" href="https://api.whatsapp.com/send?phone=62876543456&text=Hallo%20Admin%20RentNow%20saya%20ingin%20konsultasi"><button class="btn btn-outline-primary btn-lg" type="button" style="background: #4DD8E8;width: 240px;min-height: 45px;font-weight: bold;color: rgb(255,255,255);border-style: none;">Hubungi<br></button></a>
                    </div>
                    <div class="col-md-6 "><img class="img-thumbnail" src="{{ asset('img/konsul.png') }}" style="border-radius: 47px;"></div>
                </div>
                <div class="row align-items-center" style="padding-top: 65px;">
                    <div class="col-md-6 mb-5"><img class="img-thumbnail" src="{{ asset('img/konsul2.png') }}" style="border-radius: 47px;"></div>
                    <div class="col-md-6">
                        <h3 style="font-size: 30px;font-weight: bold;">Kemudahan Dalam Mencari Alat Sesuai Kategori<br></h3>
                        <div class="getting-started-info">
                            <p style="font-size: 20px;">Kami menyediakan fitur pengkategorian alat sesuai jenis-jenis kebutuhan customer.<br></p>
                        </div><a target="_blank" href="https://api.whatsapp.com/send?phone=62876543456&text=Hallo%20Admin%20RentNow%20saya%20ingin%20konsultasi"><button class="btn btn-outline-primary btn-lg" type="button" style="background: #4DD8E8;width: 240px;min-height: 45px;font-weight: bold;color: rgb(255,255,255);border-style: none;">Hubungi<br></button></a>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
        <div class="container text-center">
        <h2 style="font-weight: bold;">Pertanyaan Populer<br></h2>
        </div>
        <br><br>
        <section class="clean-block features">
            <br>
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
        <br>
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading text-center">
                    <h2 style="color: rgb(0,0,0);font-weight: bold;">Berita Terbaru<br></h2>
                </div>
                <br>
                <div class="row justify-content-center">
                    @foreach($blog as $dblog)
                    <div class="col-4 mb-5" style="border-radius: 55px;width: 400px;">
                        <a class="nav-link  link-dark" href="{{ url('/detail-blog/'.$dblog->id.'') }}">
                        <div class="card text-center clean-card" style="border-radius: 55px;">
                            <img class="card-img-top w-100 d-block" src="{{ asset($dblog->image) }}"  style="border-top-left-radius: 55px;border-top-right-radius: 55px; height: 300px;" >
                            <div class="card-body info" style="box-shadow: 0px 1px 2px;border-bottom-right-radius: 55px;border-bottom-left-radius: 55px;">
                                <h4 class="card-title" style="text-align: left;font-size: 30px;">{{substr($dblog->title,0,15)}}..<br></h4>
                                <p class="card-text" style="text-align: left;font-size: 22px;">{{substr($dblog->desk,0,100)}}...<br></p>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
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