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

                                <form method="POST" action="{{ route('article.update') }}" autocomplete="off"  enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">
                            
                            <div class="col-4">
                                
                                <img  class="img-thumbnail rounded" style="font-size: 60px; height: 100%; width: 100%;" src="{{ asset($article->image) }}" alt="Responsive image"></img>
                                
                            </div>
                            <div class="col-8">
               
                                            <input type="hidden" id="id" class="form-control" name="id" value="{{$article->id}}">
                               
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="title">Nama<span class="small text-danger">*</span></label>
                                            <input type="text" id="title" class="form-control" value="{{$article->title}}" name="title" placeholder="nameProduct">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="desk">Spektifikasi<span class="small text-danger">*</span></label>
                                            <textarea type="text" id="desk" class="form-control" name="desk"  placeholder="desk">{{$article->desk}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="imgArticle">Gambar Image</label>
                                            <input type="file" id="imgArticle" class="form-control" name="imgArticle">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <!-- Button -->
                        <div class="mt-2">
                            <button type="reset" class="btn btn-info">Reset</button>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>    
                    </form>

                                <hr>
    </div>
    </div>
@endsection
