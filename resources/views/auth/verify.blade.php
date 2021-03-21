
@extends('layouts.verify')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-header"><h3>{{ __('Verify Your Email Address') }}</h3></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            <h2>
                                {{ __('A fresh verification link has been sent to your email address.') }}

                            </h2>
                        </div>
                    @endif

                    <h2 class="alert alert-success" role="alert">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                    </h2>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@prepend('styles')
    <style>
        #footer {
            position:fixed;
            bottom:0;
            width: 100%;
            /*height: 200px;*/
        }
        body {
            background-image: url("{{ asset('user/images/mail/mail.jpg') }}") !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
            min-height: 100% !important;
        }
    </style>

@endprepend
