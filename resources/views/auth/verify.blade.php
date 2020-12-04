@extends('layouts.app')

@section('content')
<div class="father-banner-micro">
    <div class="container main-banner-micro text-center text-white">
        <div class="img-micro">
            <img class="img-fluid" src="{{ Storage::url($parametros->banner_login )}}" alt="{{ __('Login') }}">
        </div>
        <div class="white-border-micro">
            {{ __('Login') }}
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
