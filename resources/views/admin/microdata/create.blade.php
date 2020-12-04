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
            <h5>Agregar microdato a {{$nombreMeta->name}}</h5>
        </div>
        <div class="col s6 form-right-align" >
            <a href="{{ route('metadata.edit',$id_meta) }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('microdata.storeMicro',['id_meta'=>$id_meta]) }}" method="POST" enctype="multipart/form-data">
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
                <div class="input-field col s6">
                    <input placeholder="Link" name="linkExterno" type="text" class="validate">
                    <label for="linkExterno">Año de</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Orden" name="orden" type="number" class="validate">
                    <label for="orden">Orden</label>
                   
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <label>Archivo</label>
                    <input type="file" name="path" value="">                    
                    
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
            <h5>Listado de microdatos de {{$nombreMeta->name}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col s12">        
          @if(sizeof($microdatas) > 0)
          <table id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Nombre (En)</th>
                <th>Archivo</th>
                <th>Link</th>                
                <th>Orden</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($microdatas as $microdata)
                <tr>
                    <td>{{ $microdata->nombre }}</td>
                    <td>{{ $microdata->nombre_en }}</td>
                    @if($microdata->path === "temp.jpg")
                    <td>NA</td>
                    @else
                    <td><a href="{{ Storage::url($microdata->path)}}">Descargar</a></td>
                    @endif
                    @if($microdata->linkExterno === "sin link")
                    <td>NA</td>
                    @else
                    <td>{{ $microdata->linkExterno }}</td>
                    @endif
                    <td>{{ $microdata->orden }}</td>
                    <td>
                        <form action="{{ route('microdata.destroyMicro',['id_meta'=>$id_meta, 'id_micro'=>$microdata->id]) }}" method="POST">                            
                            @csrf                            
                            <button type="submit" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          @else
              <div class="alert alert-alert">No hay microdatos asociados</div>
          @endif    
        </div>
    </div>

</div>
@endsection
@section('javascript')

<script src="{{ asset('js/g/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('js/g/materialize.js') }}"></script>


@endsection