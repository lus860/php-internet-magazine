@extends('user/layouts.app')

@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>{{ __('auth.login_to_your_account') }}</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group has-feedback">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="{{ __('auth.email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="{{ __('auth.password') }}">

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
                            <a  href="{{ route('password.request') }}">
                                {{ __('auth.forget_your_password') }}
                            </a>
                        @endif
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">{{ __('auth.or') }}</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>{{ __('auth.new_user_signup') }}</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group has-feedback">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" autocomplete="firstname" autofocus placeholder="{{ __('auth.first_name') }}">

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus placeholder="{{ __('auth.last_name') }}">

                                @error('lastname')
                                <span class="invalid-feedback " role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input id="email" type="email" class="form-control @error('email_reg') is-invalid @enderror" name="email_reg" value="{{ old('email_reg') }}" autocomplete="email" placeholder="{{ __('auth.email') }}">

                                @error('email_reg')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input id="password" type="password" class="form-control @error('password_reg') is-invalid @enderror" name="password_reg" autocomplete="new-password" placeholder="{{ __('auth.password') }}">

                                @error('password_reg')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group has-feedback">
                                <input id="password-confirm" type="password" class="form-control" name="password_reg_confirmation" autocomplete="new-password" placeholder="{{ __('auth.password_confirmation') }}">
                            </div>
                            <button type="submit" class="btn btn-default">{{ __('auth.sign_up') }}</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection
