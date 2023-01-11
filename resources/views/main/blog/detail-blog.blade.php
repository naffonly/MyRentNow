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
    <br>

    <section class="clean-block clean-post dark">
        <div class="container">
            <div class="block-content">
                <div class="post-body">
                <h1 class="text-center">{{$db->title}}</h1>
                <br>
                    <div class="container">
                        <img class="rounded mx-auto d-block" src="{{ asset($db->image) }}"  alt="A generic square placeholder image with rounded corners in a figure." width="50%">
                    </div>
                    <br>
                    <p style="text-align: justify">{{$db->desk}}</p>
                </div>
            </div>
        </div>
    </section>
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
                    <p style="color: rgb(255,255,255);">admin@rentnow.com<br></p>
                </div>
                <div class="col">
                    <h5>Media Sosial Kami</h5>
                    <p style="color: rgb(255,255,255);">@rent_now</p>
                    <p style="color: rgb(255,255,255);">08976666</p>
                </div>
                
            </div>
        </div>
    </footer>

    <!-- footer -->
    <footer>
        <p>2022 RentNow - All rights reserved</p>
      </footer>