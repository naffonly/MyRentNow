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
    <main class="mb-2">
        <!-- mt-5 -->
        <div class="container">


          <br><br>
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <img src="{{ asset('img/default.jpg') }}" width="400px" class="img-fluid" alt="...">
              </div>
              
              <div class="col-sm">
               <b ><h2> Canon EOS 4000D</b> </h2>
                <br>
                <h6>DSLR pemula untuk membedakan Anda</h6>
                <h6>18,0 MP, sensor APS-C</h6>
                <h6>Wi-Fi¹, Panduan Fitur</h6>
                <br><h6>*Harga mulai dari</h6>
                <h6>Rp. 50.000</h6>
                <br><h6>Note :</h6>
                <h6>Mohon konfirmasi stok produk sebelum sewa</h6>
                <br><br>
                <div class="container-fluid">
                <div class="d-grid gap-2">
                    <a  class="btn text-white btn-lg btn-block border-item" style="background-color:#4DD8E8;" style>Sewa</a>
                </div>
            </div>
              </div>
            </div>
          </div>


          <!-- Deatail-->
          <br><br>
            <h2 class="ml-4">Detail Produk</h2>
            <hr>
            <div class="container">
            <div class="row">
              <!-- kamera1 -->
              <div class="col">
                <div class="row m-1">
                    <div class="card">
                      <img src="{{ asset('img/default.jpg') }}" width="400px" class="img-fluid" alt="...">
                      <div class="card-body text-white" style="background-color:#4DD8E8">
                       <center><h5 class="card-title">Mini 90</h5></center> 
                    </div>
                  </div>
                </div>
              </div>
              <!-- kamera2 -->
              <div class="col">
                <div class="row m-1" >
                  <div class="card" >
                    <img src="{{ asset('img/default.jpg') }}" width="400px" class="img-fluid" alt="...">
                    <div class="card-body text-white" style="background-color:#4DD8E8">
                     <center><h5 class="card-title">Mini 40</h5></center> 
        
                  </div>
                </div>
              </div>
              </div>
              <!-- kamera3 -->
              <div class="col">
                <div class="row m-1">
                  <div class="card">
                    <img src="{{ asset('img/default.jpg') }}" width="400px" class="img-fluid" alt="...">
                    <div class="card-body text-white" style="background-color:#4DD8E8">
                      <center><h5 class="card-title">Mini 11</h5></center>
                      
                  </div>
                </div>
              </div>
              </div>
              </div>
              
            </div>
              
              

        </div>
        </div>
       </main>
       <br>
      
      <!-- footer -->
      <footer>
        <p>2022 RentNow - All rights reserved</p>
      </footer>