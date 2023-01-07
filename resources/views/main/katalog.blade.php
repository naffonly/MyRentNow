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
    <img src="{{ asset('img/header.png') }}" width="100%" height="100%" >
      
<main class="mb-2">

        <div class="container">
        <br>
          <h2 class="ml-4">Kamera</h2>
          <hr>
          <!-- Kamera-->
          <div class="container">
            <div class="row">
            @foreach($camera as $pCamera)
           
              
              <div class="col">
                <a class="nav-link  link-dark" href="{{ url('/detail-katalog/'.$pCamera->id.'') }}">  
                <div class="row m-1">
                    <div class="card">
                      <img src="{{ asset($pCamera->imgP) }}" width="400px" style="height: 400px; transform: scale(0.7);" class="img-fluid" alt="...">
                      <div class="card-body text-white" style="background-color:#4DD8E8">
                       <center><h5 class="card-title">{{$pCamera->nameP}}</h5></center> 
                    </div>
                  </div>  
                </div>
              </a>
              </div>
           
              @endforeach
              </div>
            </div>
            <br>
            <div class="container">
                <div class="d-grid gap-2">
                    <a href="{{ route('kameraKatalog') }}" class="btn text-white btn-lg btn-block border-item" style="background-color:#4DD8E8;" style>Produk Lainnya</a>
                </div>
            </div>
        </div>

        <div class="container">
        <br>
          <h2 class="ml-4">iPad</h2>
          <hr>
          <!-- Kamera-->
          <div class="container">
            <div class="row">
            @foreach($ipad as $pIpad)
              
              <div class="col">
                <a class="nav-link  link-dark" href="{{ url('/detail-katalog/'.$pIpad->id.'') }}">  
                <div class="row m-1">
                    <div class="card">
                      <img src="{{ asset($pIpad->imgP) }}" width="400px" style="height: 400px; transform: scale(0.7);" class="img-fluid" alt="...">
                      <div class="card-body text-white" style="background-color:#4DD8E8">
                       <center><h5 class="card-title">{{$pIpad->nameP}}</h5></center> 
                    </div>
                  </div>  
                </div>
                </a>
              </div>
              @endforeach
              </div>
            </div>
            <br>
            <div class="container">
                <div class="d-grid gap-2">
                    <a href="{{ route('ipadKatalog') }}" class="btn text-white btn-lg btn-block border-item" style="background-color:#4DD8E8;" style>Produk Lainnya</a>
                </div>
            </div>
        </div>

        <div class="container">
        <br>
          <h2 class="ml-4">Laptop</h2>
          <hr>
          <!-- Kamera-->
          <div class="container">
            <div class="row">
            @foreach($laptop as $lp)
              
              <div class="col">
                <a class="nav-link  link-dark" href="{{ url('/detail-katalog/'.$lp->id.'') }}">  
                <div class="row m-1">
                    <div class="card">
                      <img src="{{ asset($lp->imgP) }}" width="400px" style="height: 400px; transform: scale(0.7);" class="img-fluid" alt="...">
                      <div class="card-body text-white" style="background-color:#4DD8E8">
                       <center><h5 class="card-title">{{$lp->nameP}}</h5></center> 
                    </div>
                  </div>  
                </div>
                </a>
              </div>
              @endforeach
              </div>
            </div>
            <br>
            <div class="container">
                <div class="d-grid gap-2">
                    <a href="{{ route('laptopKatalog') }}" class="btn text-white btn-lg btn-block border-item" style="background-color:#4DD8E8;" style>Produk Lainnya</a>
                </div>
            </div>
        </div>

        <div class="container">
        <br>
          <h2 class="ml-4">Proyektor</h2>
          <hr>
          <!-- Kamera-->
          <div class="container">
            <div class="row">
            @foreach($proyektor as $py)
              
              <div class="col">
                <a class="nav-link  link-dark" href="{{ url('/detail-katalog/'.$py->id.'') }}">  
                <div class="row m-1">
                    <div class="card">
                      <img src="{{ asset($py->imgP) }}" width="400px" style="height: 400px; transform: scale(0.7);" class="img-fluid" alt="...">
                      <div class="card-body text-white" style="background-color:#4DD8E8">
                       <center><h5 class="card-title">{{$py->nameP}}</h5></center> 
                    </div>
                  </div>  
                </div>
                </a>
              </div>
              @endforeach
              </div>
            </div>
            <br>
            <div class="container">
                <div class="d-grid gap-2">
                    <a  href="{{ route('proyektorKatalog') }}" class="btn text-white btn-lg btn-block border-item" style="background-color:#4DD8E8;" style>Produk Lainnya</a>
                </div>
            </div>
        </div>
        
        <div class="container">
        <br>
          <h2 class="ml-4">Handy Talkie</h2>
          <hr>
          <!-- Kamera-->
          <div class="container">
            <div class="row">
            @foreach($ht as $pht)
              
              <div class="col">
                <a class="nav-link  link-dark" href="{{ url('/detail-katalog/'.$pht->id.'') }}">  
                <div class="row m-1">
                    <div class="card">
                      <img src="{{ asset($pht->imgP) }}" width="400px" style="height: 400px; transform: scale(0.7);" class="img-fluid" alt="...">
                      <div class="card-body text-white" style="background-color:#4DD8E8">
                       <center><h5 class="card-title">{{$pht->nameP}}</h5></center> 
                    </div>
                  </div>  
                </div>
                </a>
              </div>
              @endforeach
              </div>
            </div>
            <br>
            <div class="container">
                <div class="d-grid gap-2">
                    <a href="{{ route('htKatalog') }}" class="btn text-white btn-lg btn-block border-item" style="background-color:#4DD8E8;" style>Produk Lainnya</a>
                </div>
            </div>
        </div>
        

        <br>
</main>

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

<footer>
        <p>2022 RentNow - All rights reserved</p>
      </footer>