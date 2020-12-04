@extends('layouts.main', ['title' => __('Register') ])
@section('head')

<script src="https://www.google.com/recaptcha/api.js?render={{config('services.recaptcha.key')}}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{config('
            services.recaptcha.key ')}}', {
                action: 'register'
            }).then(function(token) {
            var recaptchaResponse = document.getElementById('recaptchaResponse');
            recaptchaResponse.value = token;
        });
    });
</script>
@endsection
@section('content')

<div class="father-banner-micro">
    <div class="container main-banner-micro text-center text-white">
        <div class="img-micro">
            <img class="img-fluid" src="{{ Storage::url($parametros->banner_registro )}}" alt="{{ __('Register') }}">
        </div>
        <div class="white-border-micro">
            {{ __('Register') }}
        </div>
    </div>
</div>

<div class="container">
    <h5 class="text-center tipo-crimson">Los campos con (*) son obligatorios</h5>
    @if ($message = Session::get('msg'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    <form class="tipo-crimson" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="formControls">
            <div class="form-group">
                <input id="name" type="text" class="rounded-0 form-control registerControl @error('name') is-invalid @enderror" placeholder="{{ __('Name') }} *" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="lastName" type="text" class="rounded-0 form-control registerControl @error('lastName') is-invalid @enderror" placeholder="{{ __('lastName') }}  *" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                @error('lastName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="email" type="email" class="rounded-0 form-control registerControl @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}  *" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" type="password" class="rounded-0 form-control registerControl @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password-confirm" type="password" class="rounded-0 form-control registerControl @error('password-confirm') is-invalid @enderror" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <input id="company" type="text" class="rounded-0 form-control registerControl @error('company') is-invalid @enderror" placeholder="{{ __('company') }}  *" name="company" value="{{ old('company') }}" required autocomplete="company" autofocus>
                @error('company')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <select id="companyKind" class="rounded-0 form-control registerControl" name="companyKind" required>
                    <option disabled selected>Tipo de institución </option>
                    <option value="Universidad - Profesor/Investigador">Universidad - Profesor/Investigador</option>
                    <option value="Centro de investivación">Centro de investivación</option>
                    <option value="Inverstigador independiente">Inverstigador independiente</option>
                    <option value="Entidad pública">Entidad pública</option>
                    <option value="ONG">ONG</option>
                    <option value="Biblioteca">Biblioteca</option>
                </select>
                @error('companyKind')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <select id="country" class="rounded-0 form-control registerControl" name="country" required>
                    <option disabled selected>País </option>
                    @foreach($countries as $country)
                    <option value='{{ $country->id }}'>{{ $country->name}}</option>
                    @endforeach
                </select>
                @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <select id="depto" class="rounded-0 form-control registerControl" name="depto" required disabled>
                    <option disabled selected value="0">Departamento </option>
                    <option value="1">AMAZONAS</option>
                    <option value="2">ANTIOQUIA</option>
                    <option value="3">ARAUCA</option>
                    <option value="4">ATLANTICO</option>
                    <option value="5">BOLIVAR</option>
                    <option value="6">BOYACA</option>
                    <option value="7">CALDAS</option>
                    <option value="8">CAQUETA</option>
                    <option value="9">CASANARE</option>
                    <option value="10">CAUCA</option>
                    <option value="11">CESAR</option>
                    <option value="12">CHOCO</option>
                    <option value="13">CORDOBA</option>
                    <option value="14">CUNDINAMARCA</option>
                    <option value="16">GUAVIARE</option>
                    <option value="17">HUILA</option>
                    <option value="18">LA GUAJIRA</option>
                    <option value="19">MAGDALENA</option>
                    <option value="20">META</option>
                    <option value="21">NARIÑO</option>
                    <option value="22">NORTE DE SANTANDER</option>
                    <option value="23">PUTUMAYO</option>
                    <option value="24">QUINDIO</option>
                    <option value="25">RISARALDA</option>
                    <option value="27">SANTANDER</option>
                    <option value="28">SUCRE</option>
                    <option value="29">TOLIMA</option>
                    <option value="30">VALLE DEL CAUCA</option>
                    <option value="31">VAUPES</option>
                    <option value="32">VICHADA</option>
                </select>
                @error('depto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="city" type="text" class="rounded-0 form-control registerControl @error('city') is-invalid @enderror" placeholder="{{ __('city') }}  *" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                @error('city')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="accionsAcept">
                    <a href="https://uniandes.edu.co/es/uso-de-datos-personales-uniandes" class="tipo-crimson" target="_blank">Politica de privacidad y protección de datos
                        personales - Universidad de los Andes</a>
                    <label><input type="checkbox" id="cbox1" value="first_checkbox" required><a href="https://datoscede.uniandes.edu.co/es/terminos-de-uso" class="tipo-crimson" target="_blank"> Aceptar los
                            términos y condiciones</a></label><br>
                </div>
            </div>

            <div class="form-group container">
                <div class="col-md-6 offset-md-6">
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                </div>
                <div class="col-md-6 offset-md-6 pl-5">
                    <button type="submit" class="btn btn-primary bg-light text-dark border-dark botonRegisterR">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </div>

    </form>

</div>

@endsection
@section('script')

<script>
    jQuery(document).ready(function() {
        $("#country").change(function() {
            if ($(this).val() == 1) {
                $("#depto").prop('disabled', false);
            } else {
                $('#depto').prop('disabled', 'disabled');
            }
        });
    });
</script>
@endsection