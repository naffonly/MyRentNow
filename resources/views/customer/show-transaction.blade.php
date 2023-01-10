@extends('layouts.customer')
@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Overview') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    

    <div class="container-fluid">
    <div class="card shadow mb-4 p-3 ">
    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                                        </ul>
                                    </div>
                                @endif
                        @foreach($data as $detail)
                                <div class="row ">
                                    @if (!file_exists(Auth::user()->indetityFace))
                                    <div class="col-4 ">
                                        <div class="card-body">
                                           <img  class="img-thumbnail rounded" style="font-size: 60px; height: 420px; width: 100%;" src="{{ asset('img/idenFD.png') }}" alt="Responsive image"></img>
                                           </div>
                                           <div class="card-header text-center">
                                          <h5 class="text-uppercase" style="font-weight: bold;">Kartu KTP</h5>
                                        </div>
                                       </div>
                                       <div class="col-4">
                                       <div class="card-body">
                                           <img  class="img-thumbnail rounded" style="font-size: 60px; height: 420px; width: 100%;" src="{{ asset('img/idenCD.png') }}" alt="Responsive image"></img>
                                           </div>
                                           <div class="card-header text-center">
                                          <h5 class="text-uppercase" style="font-weight: bold;">{{$detail->name}}</h5>
                                        </div></div>
                                        <div class="col-4">
                                            <div class="card-body">
                                                <img  class="img-thumbnail rounded" style="font-size: 60px; height: 420px; width: 100%;" src="{{ asset($detail->imgP) }}" alt="Responsive image"></img>
                                            </div>
                                            <div class="card-header text-center">
                                                <h5 class="text-uppercase" style="font-weight: bold;">{{$detail->nProduct}}</h5>
                                            </div>
                                        </div>
                                    @else
                                    <div class="col-4 ">
                                        <div class="card-body">
                                           <img  class="img-thumbnail rounded" style="font-size: 60px; height: 420px; width: 100%;" src="{{ asset($detail->indenF) }}" alt="Responsive image"></img>
                                           </div>
                                           <div class="card-header text-center">
                                          <h5 class="text-uppercase" style="font-weight: bold;">Kartu KTP</h5>
                                        </div>
                                       </div>
                                       <div class="col-4">
                                       <div class="card-body">
                                           <img  class="img-thumbnail rounded" style="font-size: 60px; height: 420px; width: 100%;" src="{{ asset($detail->indenC) }}" alt="Responsive image"></img>
                                           </div>
                                           <div class="card-header text-center">
                                          <h5 class="text-uppercase" style="font-weight: bold;">{{$detail->name}}</h5>
                                        </div></div>
                                        <div class="col-4">
                                            <div class="card-body">
                                                <img  class="img-thumbnail rounded" style="font-size: 60px; height: 420px; width: 100%;" src="{{ asset($detail->imgP) }}" alt="Responsive image"></img>
                                            </div>
                                            <div class="card-header text-center">
                                                <h5 class="text-uppercase" style="font-weight: bold;">{{$detail->nProduct}}</h5>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    
                                </div>
                              <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <h1>Detail Transaksi</h1>
                                        </div>
                                    </div>                              
                                </div>
                                <div class="row px-5">
                                    <div class="col-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="spekProduct">Nama<span class="small text-danger">*</span></label>
                                            <input type="text" id="spekProduct" class="form-control" name="spekProduct" value="{{$detail->name}}" placeholder="spekProduct" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="spekProduct">Email<span class="small text-danger">*</span></label>
                                            <input type="text" id="spekProduct" class="form-control" name="spekProduct" value="{{$detail->email}}" placeholder="spekProduct" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="spekProduct">Nomer HP<span class="small text-danger">*</span></label>
                                            <input type="text" id="spekProduct" class="form-control" name="spekProduct" value="{{$detail->phone}}" placeholder="spekProduct" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-5">
                                    <div class="col-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="spekProduct">Alamat<span class="small text-danger">*</span></label>
                                            <input type="text" id="spekProduct" class="form-control" name="spekProduct" value="{{$detail->address}}" placeholder="spekProduct" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="spekProduct">Nama Barang<span class="small text-danger">*</span></label>
                                            <input type="text" id="spekProduct" class="form-control" name="spekProduct" value="{{$detail->nProduct}}" placeholder="spekProduct" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row px-5">
                                    <div class="col-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="spekProduct">Tanggal Ambil<span class="small text-danger">*</span></label>
                                            <input type="text" id="spekProduct" class="form-control" name="spekProduct" value="{{$detail->dateIn}}" placeholder="spekProduct" readonly>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="spekProduct">Tanggal Kembali<span class="small text-danger">*</span></label>
                                            <input type="text" id="spekProduct" class="form-control" name="spekProduct" value="{{$detail->dateOut}}" placeholder="spekProduct" readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h1>Nominal Pembayaran</h1>
                                            <h4>Rp{{$detail->price}},-</h4>
                                        </div>
                                    </div>    
                                    <div class="col-6">
                                        <div class="text-center">
                                            <h1>Status Peminjaman</h1>
                                            <h4>{{$detail->status}}</h4>
                                        </div>
                                    </div>                           
                                </div> 
                               
                @endforeach
            <hr>
        </div>
    </div>
@endsection
