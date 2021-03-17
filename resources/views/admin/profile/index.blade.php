@extends('admin/layouts.profile')

@section('content')

    <div class="container emp-profile">
        <form method="POST" action="{{ route('profile_update') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ Auth::user()->image }}" alt=""/>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h1 class="mb-5">
                            Update Profile
                        </h1>
                        <div class="row my-3">
                            <div class="col-md-6">
                                <p>
                                    <b>Firs name</b>
                                </p>
                                <p>
                                    <b>Last name</b>
                                </p>
                                <p>
                                    <b>Role</b>
                                </p>
                                <p>
                                    <b>Phone</b>
                                </p>
                                <p>
                                    <b>Address</b>
                                </p>
                            </div>
                            <div class="col-md-6">

                                <p>
                                    {{ Auth::user()->firstname }}
                                </p>
                                <p>
                                    {{ Auth::user()->lastname }}
                                </p>
                                <p>
                                    {{ Auth::user()->role = Auth::user()::ADMIN ?'Admin':'User' }}
                                </p>
                                <p>
                                    {{ Auth::user()->phone }}
                                </p>
                                <p>
                                    {{ Auth::user()->address }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8 offset-md-4">
                        <div class="form-group has-feedback">
                            <label for="firstname" >{{ __('Firstname') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-append" >
                                    <div class="input-group-text">
                                        <i class="fa fa-fw fa-user"></i>
                                    </div>
                                </div>
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ Auth::user()->firstname }}" autocomplete="firstname" autofocus placeholder="First Name">
                            </div>
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <label for="lastname">{{ __('Lastname') }}</label>

                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa fa-fw fa-user"></i>
                                    </div>

                                </div>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname')?:Auth::user()->lastname }}" required autocomplete="lastname" autofocus placeholder="Last Name">
                            </div>
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <label for="phone" >{{ __('Phone') }}</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                </div>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone')?:Auth::user()->phone }}" placeholder="Phone">
                            </div>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <label for="address" >{{ __('Address') }}</label>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="far fa-address-card"></i>
                                    </div>
                                </div>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address')?:Auth::user()->address }}" placeholder="Address">
                            </div>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email" >{{ __('Email') }}</label>

                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')?:Auth::user()->email }}" required autocomplete="email" placeholder="Email">
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                            </div>
                            <div class="col-md-4 offset-md-4" style="left: 60px;">
                                <a  href="{{ URL::previous() }}">
                                    <input type="button" class="profile-edit-btn" value="Go Back" style="outline: none;"/>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8">
                            @if (Route::has('password.request'))
                                <a  href="{{ route('password.request') }}">
                                    {{ __('Want to change your password?') }}
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
@push('css')
    <style>
        body{
            background: #d2d6de;
            font-size: 16px;
        }
        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }
    </style>
@endpush
