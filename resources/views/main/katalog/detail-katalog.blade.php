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

          @foreach ($product as $item)
              
        
          <br><br>
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6">
                <img src="{{ asset($item->imgP) }}" class="img-fluid mb-5" alt="...">
              </div>
              
              <div class="col-md-6">
               <h2 class="fw-bold">{{$item->nameP}}</h2>
                <p>{{$item->spekP}}</p>

                <h3 class="fw-bold">Harga sewa</h3>
                <h4>Rp{{$item->priceP}},- /Hari</h4>
                <br><br>
                <div class="container-fluid">
                <div class="d-grid gap-2">
                <button type="button" class="btn text-white btn-lg btn-block border-item" style="background-color:#4DD8E8;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">SEWA</button>
              
                <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                      
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" action="{{ route('transaction.rent') }}" autocomplete="off"  enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="hidden" name="idPeminjam" value="{{Auth::user()?->id}}">
                          <input type="hidden" name="idProduct" value="{{$item->id}}">
                          
                          <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="dateIn">Waktu Diambil<span class="small text-danger">*</span></label>
                                    <input type="datetime-local" id="dateIn" class="form-control" name="dateIn" placeholder="dateIn">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="dateOut">Waktu Dikembali<span class="small text-danger">*</span></label>
                                    <input type="datetime-local" id="dateOut" class="form-control" name="dateOut" placeholder="dateOut">
                                </div>
                            </div>
                          
                          </div>
                          <br>
                        <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary " data-bs-dismiss="modal">Reset</button>
                              <button type="submit" class="btn btn-info text-white ">Sewa</button>
                        </div> 
                      </form> 
                        </div>
                                   
                       
                      
                      </div>
                      
                    </div>
                  </div>
                </div>
                </div>
              </div>
              </div>
            </div>
          </div>


          <!-- Deatail-->
          <br><br>
          <div class="container">
            <h2 class="ml-4">Barang Rekomendasi</h2>
          </div>
            <hr>
            <div class="container">
            <div class="row">
              <!-- kamera1 -->
              @foreach ($newInOne as $pd)
              <div class="col-4 mb-3">
                <div class="card" >
                  <img src="{{ asset($pd->imgP) }}" class="card-img-top" width="400px" alt="...">
                  <div class="card-body text-white" style="background-color:#4DD8E8">
                    <a class="nav-link  link-light" href="{{ url('/detail-katalog/'.$pd->id.'') }}"> <h5 class="card-title text-center">{{$pd->nameP}}</h5></a>
                  </div>
            </div>
          </div>
              @endforeach
              @foreach ($newInTwo as $pd)
              <div class="col-4 mb-3">
                <div class="card" >
                  <img src="{{ asset($pd->imgP) }}" class="card-img-top" width="400px" alt="...">
                  <div class="card-body text-white" style="background-color:#4DD8E8">
                    <a class="nav-link  link-light" href="{{ url('/detail-katalog/'.$pd->id.'') }}"> <h5 class="card-title text-center">{{$pd->nameP}}</h5></a>
                  </div>
            </div>
          </div>
              @endforeach
              @foreach ($newInThree as $pd)
              <div class="col-4 mb-3">
                <div class="card" >
                  <img src="{{ asset($pd->imgP) }}" class="card-img-top" width="400px" alt="...">
                  <div class="card-body text-white" style="background-color:#4DD8E8">
                    <a class="nav-link  link-light" href="{{ url('/detail-katalog/'.$pd->id.'') }}"> <h5 class="card-title text-center">{{$pd->nameP}}</h5></a>
                  </div>
            </div>
          </div>
              @endforeach
            </div>
            @endforeach
        </div>
        </div>
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

    <script >
      var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = 'New message to ' + recipient
  modalBodyInput.value = recipient
})
    </script>