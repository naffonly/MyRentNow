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
                        @foreach($data as $detail)
                                <div class="row">
                                    <div class="col-4">
                                    
                                     <div class="card-body">
                                        <img  class="img-thumbnail rounded" style="font-size: 60px; height: 330px; width: 350px;" src="{{ asset($detail->indenF) }}" alt="Responsive image"></img>
                                        </div>
                                        <div class="card-header text-center">
                                       <h5 class="text-uppercase" style="font-weight: bold;">Kartu KTP</h5>
                                     </div>
                                    </div>
                                    <div class="col-4">
                                    <div class="card-body">
                                        <img  class="img-thumbnail rounded" style="font-size: 60px; height: 330px; width: 350px;" src="{{ asset($detail->indenC) }}" alt="Responsive image"></img>
                                        </div>
                                        <div class="card-header text-center">
                                       <h5 class="text-uppercase" style="font-weight: bold;">Kartu KTP</h5>
                                     </div></div>
                                    <div class="col-4">
                                        <div class="card-body">
                                            <img  class="img-thumbnail rounded" style="font-size: 60px; height: 330px; width: 350px;" src="{{ asset($detail->imgP) }}" alt="Responsive image"></img>
                                        </div>
                                        <div class="card-header text-center">
                                            <h5 class="text-uppercase" style="font-weight: bold;">Kartu KTP</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    
                                </div>
                @endforeach
            <hr>
        </div>
    </div>
   
@endsection
