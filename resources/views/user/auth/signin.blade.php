@extends('user/layouts.app')

@section('content')
    <section id="form" style="margin-top: 70px!important;"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 mx-auto">
                    <div class="login-form"><!--login form-->
                        <h2 style="font-size: 30px!important;"><b>{{ __('auth.login_to_your_account') }}</b></h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group has-feedback">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" autocomplete="email" autofocus
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
                                       autocomplete="current-password" placeholder="{{ __('auth.password') }}">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span>
                                <input type="checkbox" name="remember" id="remember"
                                       {{ old('remember') ? 'checked' : '' }} >
                                {{ __('auth.remember_me') }}
                           </span>
                            <button type="submit" class="btn btn-default">{{ __('auth.sign_in') }}</button>
                        </form>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('auth.forget_your_password') }}
                            </a>
                        @endif
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
