<div class="container">
    <h5 class="text-center">Los campos con (*) son obligatorios</h5>
    <form method="POST" action="{{ route('auth.admin') }}">
        @csrf
        <div class="row">
            <div class="formControls col-md-12">
                <div class="input-group mb-3">
                    <select class="form-control" name="tipo_proy" id="tipo_proy" required>
                        <option disabled selected value="">Objetivo: </option>
                        <option value="Académico">Académico</option>
                        <option value="Profesional">Profesional</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <textarea id="descripcion_proy" name="descripcion_proy" class="form-control" placeholder="Descripción del proyecto*" required></textarea>
                </div>
                <input id="idDato" name="idDato" type="hidden" value="{{$metadata->id}}">
                <input id="nombreDato" name="nombreDato" type="hidden" value="{{$metadata->name}}">
                <input id="versionDato" name="versionDato" type="hidden" value="{{$metadata->version}}">
            </div>
            <div class="accionsregister col-md-8 pr-0">
                <div class="accionsAcept">
                    <a href="https://uniandes.edu.co/es/uso-de-datos-personales-uniandes" class="tipo-crimson" target="_blank">Politica de privacidad y protección de datos
                        personales - Universidad de los Andes</a>
                    <label><input type="checkbox" id="cbox1" value="first_checkbox" required><a href="https://datoscede.uniandes.edu.co/es/terminos-de-uso" class="tipo-crimson" target="_blank"> Aceptar los
                            términos y condiciones</a></label><br>
                </div>
            </div>
            <div class="col-md-3 ml-5 pl-4">
                <button type="submit" class="btn btn-primary">
                    Solicitar Autorización
                </button>
            </div>
        </div>
    </form>
    
</div>