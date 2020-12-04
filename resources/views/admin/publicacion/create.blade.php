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
            <h5>Agregar publicaciones a {{$nombreMeta->name}}</h5>
        </div>
        <div class="col s6 form-right-align" >
            <a href="{{ route('metadata.edit',$id_meta) }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('publicacion.storePubli',['id_meta'=>$id_meta]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Nombre" name="nombre" type="text" class="validate">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Name" name="nombre_en" type="text" class="validate">
                    <label for="nombre_en">Nombre(En)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">                    
                    <textarea name="texto" ></textarea>
                    <label for="texto">Texto</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea name="texto_en"></textarea>
                    <label for="texto_en">Texto(En)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Orden" name="orden" type="number" class="validate">
                    <label for="orden">Orden</label>
                   
                </div>
            </div>                              
            <div class="row">
                <div class="col s10 talignCenter" >                    
                    <a href="" onclick="this.closest('form').submit();return false;" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Guardar </a>
                </div>                
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col s6 form-left-align" >
            <h5>Listado de publicaciones de {{$nombreMeta->name}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col s12">        
          @if(sizeof($publicaciones) > 0)
          <table id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Nombre (En)</th>
                <th>Texto</th>
                <th>Texto (En)</th>             
                <th>Orden</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($publicaciones as $publicacion)
                <tr>
                    <td>{{ $publicacion->name }}</td>
                    <td>{{ $publicacion->name_en }}</td>
                    <td>{{ $publicacion->texto }}</td>
                    <td>{{ $publicacion->texto_en }}</td>
                    <td>{{ $publicacion->orden }}</td>
                    <td>
                        <form action="{{ route('publicacion.destroyPubli',['id_meta'=>$id_meta, 'id_publi'=>$publicacion->id]) }}" method="POST">                            
                            @csrf                            
                            <button type="submit" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          @else
              <div class="alert alert-alert">No hay material relacionado </div>
          @endif    
        </div>
    </div>

</div>
@endsection
@section('javascript')

<script src="{{ asset('js/g/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('js/g/materialize.js') }}"></script>
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