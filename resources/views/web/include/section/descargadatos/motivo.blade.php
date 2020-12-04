<div class="container">
    <form method="POST" action="{{ route('complete.motivation') }}">
        @csrf
    <h5 class="text-center tipo-crimson">Motivo de la descarga</h5>
    <div class="formControls">
        <div class="input-group mb-3">
            <input id="idDato" name="idDato"  type="hidden" value="{{$metadata->id}}" >
            <input id="nombreDato" name="nombreDato" type="hidden" value="{{$metadata->name}}" >
            <input id="versionDato" name="versionDato" type="hidden" value="{{$metadata->version}}" >
            <textarea type="text" class="form-control" id="motivo" name="motivo" placeholder="" aria-label="Motivo de descarga" aria-describedby="basic-addon1" required></textarea>
        </div>
    </div>
    <div class="accionsregister">
        <div class="accionsAcept">
            <p>{{ __('msg-motivo-descarga') }}</p>
            <a href="https://uniandes.edu.co/es/uso-de-datos-personales-uniandes" class="tipo-crimson" target="_blank">Politica de privacidad y protección de datos
                personales - Universidad de los Andes</a>
            <label><input type="checkbox" id="cbox1" value="first_checkbox" required><a href="https://datoscede.uniandes.edu.co/es/terminos-de-uso" class="tipo-crimson" target="_blank"> Aceptar los
                términos y condiciones</a></label><br>
        </div>
        <button type="submit" class="btn btn-primary">
            Acceder a Datos
        </button>
    </div>
    </form>
</div>