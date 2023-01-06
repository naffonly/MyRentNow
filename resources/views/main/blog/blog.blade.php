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
<div class="row justify-content-center" style="margin: 120px 56px;">
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
<div class="row justify-content-center" style="margin: 120px 56px;">
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
<div class="row justify-content-center" style="margin: 120px 56px;">
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