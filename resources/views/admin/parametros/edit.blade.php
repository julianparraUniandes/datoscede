@extends('layouts.admin')
@section('head')
    <script src="https://cdn.tiny.cloud/1/{{config('services.tinymce.key')}}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
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
            <h5>Parametros</h5>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('parametros.update',$parametro->id) }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('put') }} 
            <div class="row">
                <div class="input-field col s6">
                    <input required name="link_uniandes" type="text" class="validate" value="{{$parametro->link_uniandes}}">
                    <label for="link_uniandes">URL Uniandes</label>
                </div>
                <div class="input-field col s6">
                    <input required name="link_cede" type="text" class="validate" value="{{$parametro->link_cede}}">
                    <label for="link_cede">URL CEDE</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input required name="footer_direccion_1" type="text" class="validate" value="{{$parametro->footer_direccion_1}}">
                    <label for="footer_direccion_1">Dirección Línea 1</label>
                </div>
                <div class="input-field col s3">
                    <input required name="footer_direccion_2" type="text" class="validate" value="{{$parametro->footer_direccion_2}}">
                    <label for="footer_direccion_2">Dirección Línea 2</label>
                </div>
                <div class="input-field col s3">
                    <input required name="footer_telefono_1" type="text" class="validate" value="{{$parametro->footer_telefono_1}}">
                    <label for="footer_telefono_1">Teléfono 1</label>
                </div>
                <div class="input-field col s3">
                    <input required name="footer_telefono_2" type="text" class="validate" value="{{$parametro->footer_telefono_2}}">
                    <label for="footer_telefono_2">Teléfono 2</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Texto Banner Home</h7>
                    <textarea class="materialize-textarea" name="banner_home_texto" value="{{$parametro->banner_home_texto}}" >{{$parametro->banner_home_texto}} </textarea>
                </div>
                <div class="input-field col s12">
                    <h7>Texto Banner Home (EN)</h7>
                    <textarea class="materialize-textarea" name="banner_home_texto_en" value="{{$parametro->banner_home_texto_en}}" >{{$parametro->banner_home_texto_en}} </textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Texto pestaña salas</h7>
                    <textarea class="materialize-textarea" name="texto_salas_detalle_metadato" value="{{$parametro->texto_salas_detalle_metadato}}" >{{$parametro->texto_salas_detalle_metadato}} </textarea>
                </div>
                <div class="input-field col s12">
                    <h7>Texto pestaña salas (EN)</h7>
                    <textarea class="materialize-textarea" name="texto_salas_detalle_metadato_en" value="{{$parametro->texto_salas_detalle_metadato_en}}" >{{$parametro->texto_salas_detalle_metadato_en}} </textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Texto pestaña inconsistencias</h7>
                    <textarea class="materialize-textarea" name="texto_inconsistencias" value="{{$parametro->texto_inconsistencias}}" >{{$parametro->texto_inconsistencias}} </textarea>
                </div>
                <div class="input-field col s12">
                    <h7>Texto pestaña inconsistencias (EN)</h7>
                    <textarea class="materialize-textarea" name="texto_inconsistencias_en" value="{{$parametro->texto_inconsistencias_en}}" >{{$parametro->texto_inconsistencias_en}} </textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Texto descarga externos</h7>
                    <textarea class="materialize-textarea" name="texto_restringidas_externos" value="{{$parametro->texto_restringidas_externos}}" >{{$parametro->texto_restringidas_externos}} </textarea>
                </div>
                <div class="input-field col s12">
                    <h7>Texto descarga externos (EN)</h7>
                    <textarea class="materialize-textarea" name="texto_restringidas_externos_en" value="{{$parametro->texto_restringidas_externos_en}}" >{{$parametro->texto_restringidas_externos_en}} </textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field  col s12">
                    <input type="file" name="banner_home" value="">
                    @if(isset($parametro->banner_home))                    
                        <img width="200px" src="{{ Storage::url($parametro->banner_home)}}">
                    @endif
                    <label>Banner Home (1920 x 1280)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field  col s12">
                    <input type="file" name="banner_catalogo" value="">
                    @if(isset($parametro->banner_catalogo))                    
                        <img width="200px" src="{{ Storage::url($parametro->banner_catalogo)}}">
                    @endif
                    <label>Banner Catalogo (2315 x 874)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field  col s12">
                    <input type="file" name="banner_db_detalle" value="">
                    @if(isset($parametro->banner_db_detalle))                    
                        <img width="200px" src="{{ Storage::url($parametro->banner_db_detalle)}}">
                    @endif
                    <label>Banner detalle base de datos(2315 x 874)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field  col s12">
                    <input type="file" name="banner_login" value="">
                    @if(isset($parametro->banner_login))                    
                        <img width="200px" src="{{ Storage::url($parametro->banner_login)}}">
                    @endif
                    <label>Banner Login(2315 x 874)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field  col s12">
                    <input type="file" name="banner_registro" value="">
                    @if(isset($parametro->banner_registro))                    
                        <img width="200px" src="{{ Storage::url($parametro->banner_registro)}}">
                    @endif
                    <label>Banner Registro (2315 x 874)</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 talignCenter" >                    
                    <button type="submit" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('javascript')
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: '',
      toolbar: ' code table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
@endsection