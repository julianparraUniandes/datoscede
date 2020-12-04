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
        <form class="col s12" action="{{route('metadata.update', $metadata->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }} 
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Nombre DB *" name="name" type="text" class="validate" value="{{$metadata->name}}">
                    <label for="first_name">Nombre DB</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Name DB *" name="name_en" type="text" class="validate" value="{{$metadata->name_en}}">
                    <label for="first_name">Nombre DB (En)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Año de *" name="ano_desde" type="number" class="validate" value="{{$metadata->ano_desde}}">
                    <label for="first_name">Año de</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Año hasta *" name="ano_hasta" type="number" class="validate" value="{{$metadata->ano_hasta}}">
                    <label for="first_name">Año hasta</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Año texto *" name="ano_texto" type="text" class="validate" value="{{$metadata->ano_texto}}">
                    <label for="first_name">Año texto</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Pais" name="pais" type="text" class="validate" value="{{$metadata->pais}}">
                    {{ Form::label('pais','País:') }}
                    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Cobertura *" name="cobertura" type="text" class="validate" value="{{$metadata->cobertura}}">
                    <label for="first_name">Cobertura</label>
                </div>
                <div class="input-field col s6">
                    {!! Form::select('id_tema', $temas, $metadata->id_tema) !!}  
                    {{ Form::label('id_tema','Tema:') }}
                    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="1 *" name="version" type="text" class="validate" value="{{$metadata->version}}">
                    <label for="first_name">Versión</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Fuente *" name="fuente" type="text" class="validate" value="{{$metadata->fuente}}">
                    <label for="first_name">Fuente</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Patrocinador *" name="patrocinador" type="text" class="validate" value="{{$metadata->patrocinador}}">
                    <label for="first_name">Patrocinador</label>
                </div>
                <div class="input-field col s6">                   
                        {!! Form::select('publicada', ['0' => 'Sin Publicar', '1' => 'Publicada'], $metadata->publicada) !!}  
                        {{ Form::label('publicada','Estado de DB:') }}
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {!! Form::select('id_tos', $tos, $metadata->id_tos) !!}                     
                    {{ Form::label('tos','Tos:') }}
                </div>
                <div class="input-field col s6">
                    <input placeholder="dd/mm/aaaa *" name="fecha_actualizacion" type="date" class="validate" value="{{$metadata->fecha_actualizacion}}">
                    <label for="first_name">Fecha publicación</label>
                </div>
            </div>
            <div class="row">
                
                <div class="input-field col s6">
                    <input placeholder="Palabra Clave *" name="keywords" type="text" class="validate" data-role="tagsinput" value="{{$metadata->keywords}}">
                    <label for="first_name">Palabras Clave</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Descripción</h7>
                    <textarea class="materialize-textarea" name="descripcion" value="{{$metadata->descripcion}}" >{{$metadata->descripcion}} </textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Descripción (En)</h7>
                    <textarea class="materialize-textarea" name="descripcion_en" value="{{$metadata->descripcion_en}}">{{$metadata->descripcion_en}}</textarea>
                </div>
            </div>
            
            <div class="row">
                <div class="col s10 talignCenter" >
                    
                    <a href="" onclick="this.closest('form').submit();return false;" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Guardar </a>
                    <a href="{{ route('microdata.createMicro',['id_metadata'=>$metadata->id]) }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Microdatos</a>
                    <a href="{{ route('material.createMate',['id_metadata'=>$metadata->id]) }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Material</a>
                    <a href="{{ route('publicacion.createPubli',['id_metadata'=>$metadata->id]) }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Publicaciones</a>
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
