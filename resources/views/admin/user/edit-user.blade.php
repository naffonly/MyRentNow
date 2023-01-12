@extends('layouts.admin')
@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Detail User') }}</h1>

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

                                <form method="POST" action="{{ route('user.update') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div>
                        <input  id="id" name="id" type="hidden" class="form-control"  autocomplete="off" value="{{$user->id}}" readonly>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="username">Username<span class="small text-danger">*</span></label>
                                        <input type="text" id="username" class="form-control" name="username" value="{{$user->username}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Name<span class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{$user->name }}" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="lastname">Last name</label>
                                        <input type="text" id="lastname" class="form-control" name="lastname" value="{{ $user->lastname }}" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email address<span class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}"  >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" >Number Phone</label>
                                        <input type="number" class="form-control" name="phone"  value="{{ $user->phone}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label"  >Birthdate</label>
                                        <input type="date"  class="form-control" name="birthdate" value="{{ $user->birthdate}}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" >Address</label>
                                        <input type="text" class="form-control" name="address" value="{{ $user->address}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" >Role</label>
                                            <select class="form-select form-control " name="role">
                                                <option selected>Select Role</option>
                                                <option value="1" @if (old('role', $user->roleId) == 1) selected @endif>admin</option>
                                                <option value="2" @if (old('role', $user->roleId) == 2) selected @endif>Costumer</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
         
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="new_password">New password</label>
                                        <input type="password" id="new_password" class="form-control" name="password" placeholder="New password">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="confirm_password">Confirm password</label>
                                        <input type="password" id="confirm_password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- Button -->
                        
                        <button type="submit" class="btn btn-info">Save</button>

                    </form>

                                <hr>
    </div>
    </div>
@endsection
