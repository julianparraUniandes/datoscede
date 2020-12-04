<div class="row">
    <div class="col-md-12 text-center">
        <div class="tabs-content-actions tabDownloadData">
            <p>{{ __('dato-detalle-login') }}</p>
            <a class="btnLogin" href="{{ route('login') }}">{{ __('login-externos') }}</a>
            <a class="btnLogin" href="{{ route('azure.login') }}">{{ __('login-uniandes') }}</a>
            @if (Route::has('register'))
                        <a class="btnRegister" href="{{ route('register') }}">{{ __('Register') }}</a>                        
            @endif
        </div>
    </div>
</div>