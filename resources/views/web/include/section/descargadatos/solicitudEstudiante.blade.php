<div class="container">
    <h5 class="text-center">Los campos con (*) son obligatorios</h5>
    <form method="POST" action="{{ route('auth.profesor') }}">
        @csrf
    <div class="formControls">

        <p>Seleccione el profesor que le dicta la asignatura para la cual está requeriendo la base de datos y describa su proyecto para solicitar el acceso a la descarga</p>
        <div class="input-group mb-3">
            <select id="profesor" class="form-control" name="profesor" required >
                <option disabled selected value="">Profesor * </option>                    
                    @foreach($profesores as $profesor)
                        <option value='{{ $profesor->email }}'>{{ $profesor->name}} {{ $profesor->lastName}}</option>
                    @endforeach
                </select>
        </div>
        <div class="input-group mb-3">
            <textarea id="descripcion_proy" name="descripcion_proy" class="form-control" placeholder="Descripción del proyecto*" required></textarea>
        </div>
        <input id="idDato" name="idDato"  type="hidden" value="{{$metadata->id}}" >
        <input id="nombreDato" name="nombreDato" type="hidden" value="{{$metadata->name}}" >
        <input id="versionDato" name="versionDato" type="hidden" value="{{$metadata->version}}" >
        
    </div>
    <div class="accionsregister">
        <div class="accionsAcept">
            <a href="https://uniandes.edu.co/es/uso-de-datos-personales-uniandes" class="tipo-crimson" target="_blank">Politica de privacidad y protección de datos
                personales - Universidad de los Andes</a>
            <label><input type="checkbox" id="cbox1" value="first_checkbox" required><a href="https://datoscede.uniandes.edu.co/es/terminos-de-uso" class="tipo-crimson" target="_blank"> Aceptar los
                términos y condiciones</a></label><br>
        </div>
        <button type="submit" class="btn btn-primary">
            Solicitar Autorización
        </button>
    </div>
    </form>
</div>