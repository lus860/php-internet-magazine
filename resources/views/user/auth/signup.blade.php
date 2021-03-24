@extends('user/layouts.app')

@section('content')
    <section id="form" style="margin-top: 70px!important;"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 mx-auto">
                    <div class="signup-form"><!--sign up form-->
                        <h2 style="font-size: 30px!important;"><b>{{ __('auth.new_user_signup') }}</b></h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group has-feedback">
                                <input id="firstname" type="text"
                                       class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                       value="{{ old('firstname') }}" autocomplete="firstname" autofocus
                                       placeholder="{{ __('auth.first_name') }}">

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input id="lastname" type="text"
                                       class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                       value="{{ old('lastname') }}" autocomplete="lastname" autofocus
                                       placeholder="{{ __('auth.last_name') }}">

                                @error('lastname')
                                <span class="invalid-feedback " role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" autocomplete="email"
                                       placeholder="{{ __('auth.email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       autocomplete="new-password" placeholder="{{ __('auth.password') }}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" autocomplete="new-password"
                                       placeholder="{{ __('auth.password_confirmation') }}">
                            </div>
                            <button type="submit" class="btn btn-default">{{ __('auth.sign_up') }}</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
