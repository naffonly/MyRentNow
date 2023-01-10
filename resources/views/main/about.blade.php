@extends('main.layouts.app')
@section('main-content')
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3  border-bottom">
    <a class="navbar-brand ms-3 text-dark" href="{{ route('landing') }}" >
        <img src="{{ asset('img/logo.png') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
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
<div class="hero">
    <div class="container d-flex align-items-center" style="height: 80%">
        <div class="" >
    <h1 class="fw-bold text-white text-center ">TENTANG KAMI</h1>
    <h3 class="fw-normal text-white text-center">VISI DAN MISI</h3>
    <div class="container">
    <p class="lh-lg text-white px-5 text-wrap" style="text-align: center;">Menyediakan pelayanan berkualitas yang melebihi

ekspektasi dari pelanggan terhormat kami.

ntuk membangun hubungan jangka panjang dengan

pelanggan dan klien dan menyediakan layanan

yang luar biasa dengan mengejar bisnis melalui

inovasi dan teknologi mutakhir</p>
    </div>
    </div>
</div>
</div>
<div id="content" style="height: 300px;">
<center><h1> KONSULTASI <br> DENGAN MENGHUBUNGI KAMI</h1></center> 
        <br>
        <div class="container">
                <div class="d-grid gap-2">
                    <a  class="btn text-white btn-lg btn-block border-item" target="_blank" href="https://api.whatsapp.com/send?phone=62876543456&text=Hallo%20Admin%20RentNow%20saya%20ingin%20konsultasi" style="background-color:#4DD8E8;" style>Hubungi</a>
                </div>
            </div>
</div>

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

<footer >
        <p>2022 RentNow - All rights reserved</p>
</footer>