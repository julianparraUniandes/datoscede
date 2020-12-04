@extends('layouts.admin')
@section('contenido')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Por favor revise el formulario y valide los datos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="formulario container">
    <div class="row">
        <div class="col s6 form-left-align" >
            <h5>Información completa de la DB</h5>
        </div>
        <div class="col s6 form-right-align" >
            <a href="{{ route('metadata.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('metadata.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Nombre DB *" name="name" type="text" class="validate">
                    <label for="name">Nombre DB</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Name DB *" name="name_en" type="text" class="validate">
                    <label for="name_en">Nombre DB (En)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Año de *" name="ano_desde" type="number" class="validate">
                    <label for="ano_desde">Año desde</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Año hasta *" name="ano_hasta" type="number" class="validate">
                    <label for="ano_hasta">Año hasta</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Año texto *" name="ano_texto" type="text" class="validate">
                    <label for="ano_texto">Año texto</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="País" name="pais" type="text" class="validate">
                    <label for="pais">País</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Cobertura *" name="cobertura" type="text" class="validate">
                    <label for="cobertura">Cobertura</label>
                </div>
                <div class="input-field col s6">
                    <select name="id_tema">
                        @foreach($temas as $tema)
                        <option value='{{ $tema->id }}'>{{ $tema->name}}</option>
                        @endforeach
                      </select>
                    <label>Tema</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="1 *" name="version" type="text" class="validate">
                    <label for="version">Versión</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Fuente *" name="fuente" type="text" class="validate">
                    <label for="fuente">Fuente</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Patrocinador *" name="patrocinador" type="text" class="validate">
                    <label for="patrocinador">Patrocinador</label>
                </div>
                <div class="input-field col s6">
                    <select name="publicada">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">Sin Publicar</option>
                        <option value="1">Publicada</option>
                      </select>
                    <label>Estado DB</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="id_tos">
                        @foreach($tos as $to)
                        <option value='{{ $to->id }}'>{{ $to->name}}</option>
                        @endforeach
                      </select>
                    <label>Tos</label>
                </div>
                <div class="input-field col s6">
                    <input placeholder="dd/mm/aaaa *" name="fecha_actualizacion" type="date" class="validate">
                    <label for="fecha_actualizacion">Fecha publicación</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Palabra Clave *" name="keywords" type="text" class="validate" data-role="tagsinput">
                    <label for="keywords">Palabras Clave</label>
                </div>
            </div>
            <div class="row">
                
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Descripción</h7>
                    <textarea class="materialize-textarea" name="descripcion" ></textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Descripción (En)</h7>
                    <textarea class="materialize-textarea" name="descripcion_en"></textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col s10 talignCenter" >
                    
                    <a href="" onclick="this.closest('form').submit();return false;" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Guardar </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('javascript')

<script src="{{ asset('js/g/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('js/g/materialize.js') }}"></script>


@endsection
