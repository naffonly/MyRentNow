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
    <br>
    
    <section class="clean-block clean-post dark">
        <div class="container">
            <div class="block-content">
                <div class="post-body">
                    <h1 class="text-center">JUDUL</h1>
                    <div class="container">
                        <img class="rounded mx-auto d-block" src="{{ asset('img/default.jpg') }}"  alt="A generic square placeholder image with rounded corners in a figure." width="50%">
                    </div>
                    <br>
                    <p>Mobile game sudah tidak bisa dianggap sebelah mata. Baik secara game play maupun grafis, sejumlah mobile game bisa dikatakan sudah menyamai game pada komputer dan konsol.<br><br>Sebut saja eFootball PES 2021, Call of Duty Mobile, LifeAfter, F1 Mobile, Real Racing, PUBG Mobile, dan Genshin Impact. Grafis pada game-game tersebut memanjakan mata sehingga menjadi favorit di kalangan gamer.<br><br>Untuk memainkan mobile game dengan grafis terbaik, gamer membutuhkan smartphone dengan spesifikasi dan fitur terbaik pula. Lantas, apa saja spesifikasi dan fitur dibutuhkan? Simak ulasan berikut.<br><br>1. Cip dan RAM<br>Hal pertama yang mesti diperhatikan adalah dapur pacu smartphone. Game-game bergrafis berat bisa dimainkan dengan lancar pada smartphone dengan cip flagship, seperti Qualcomm Snapdragon 8 Gen 1, Mediatek Dimensity 9000, Exynos 2200, serta Apple A16 Bionic. Prosesor-prosesor smartphone ini punya skor AnTuTu9 teratas.<br><br>Sebagai contoh, Qualcomm Snapdragon 8 Gen 1 yang disematkan pada flagship smartphone Oppo Find X5 Pro 5G. Oleh AnTuTu9, prosesor ini mendapatkan skor 1.031.325, mengungguli Mediatek Dimensity 9000 yang punya skor 999.171 dan A16 Bionic dengan skor 953.305.<br><br>Chief Creative Officer Oppo Indonesia Patrick Owen menjelaskan, prosesor multicore Snapdragon 8 Gen 1 pada Oppo Find X5 Pro 5G mampu memproses game dan aplikasi yang membutuhkan spesifikasi tinggi.<br><br>Didukung 8 inti, Snapdragon 8 Gen 1 mampu meningkatkan performa hingga 30 persen ketimbang seri Snapdragon 888. Selain itu, arsitektur ARMV9 dan teknologi Qualcomm AI Engine generasi ketujuh membuat prosesor tersebut bisa bekerja empat kali lebih cepat ketimbangSnapdragonpendahulu.<br><br>GPU Andreno 730 juga bisa memproses atau rendering grafis 50 persen lebih cepat. GPU ini juga bekerja 25 persen lebih efisien. Efisiensi ini membuat Snapdragon 8 Gen 1 di Oppo Find X5 Pro 5G lebih hemat energi.<br><br>Ponsel tersebut juga dibekali sistem multi-tier cooling yang berfungsi menyalurkan panas dan mendinginkan prosesor. Selain dapur pacu yang andal, smartphone juga wajib dilengkapi random access memory (RAM) berkapasitas jumbo. Ponsel pintar minimal memiliki RAM 8 GB agar bisa menjalankan game berat dengan lancar tanpa lagging.<br></p>
                </div>
            </div>
        </div>
    </section>

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