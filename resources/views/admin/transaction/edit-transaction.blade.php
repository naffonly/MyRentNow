@extends('layouts.admin')
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
                        
                                <form method="POST" action="{{ route('transaction.store') }}" autocomplete="off">
                                
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{$transaction->id}}">
                        <div class="row">
                       
                            <div class="col-lg-6">
                                    <div class="form-group focused"> 
                                            <label class="form-control-label" for="idPeminjam">Peminjam<span class="small text-danger">*</span></label>
                                            @foreach($data as $b)
                                            
                                            <input type="text" class="form-control" value="{{$b->nProduct}}" readonly>
                                            @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused"> 
                                            <label class="form-control-label" for="idProduct">Status<span class="small text-danger">*</span></label>
                    
                                                <select class="form-select form-control " name="idStatus">
                                                    <option selected>Pilih Kategori</option>
                                                    <option value="1" @if (old('idStatus', $transaction->status) == 1) selected @endif>Pending</option>
                                                    <option value="2" @if (old('idStatus', $transaction->status) == 2) selected @endif>Dipinjam</option>
                                                    <option value="3" @if (old('idStatus', $transaction->status) == 3) selected @endif>Dikembali</option>
                                                    <option value="4" @if (old('idStatus', $transaction->status) == 4) selected @endif>Kamera</option>
                                               </select>
                                          
                                    </div>
                                </div>
                            </div>
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
                       
                        <!-- Button -->
                        <button type="reset" class="btn btn-info">Reset</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </form>
               
            <hr>
        </div>
    </div>
   
@endsection
