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
        <div class="col s6 form-left-align">
            <h5>Datos del botón</h5>
        </div>
        <div class="col s6 form-right-align" >
            <a href="{{ route('menu.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Texto" name="name" type="text" class="validate">
                    <label for="name">Texto</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Texto" name="name_en" type="text" class="validate">
                    <label for="name_en">Texto (En)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Link" name="link" type="text" class="validate">
                    <label for="link">Link</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Orden" name="orden" type="text" class="validate">
                    <label for="orden">Orden</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <select name="target">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="_self">_self</option>
                        <option value="_blank">_blank</option>
                      </select>
                    <label>Target</label>
                </div>
                <div class="input-field col s3">
                    {!! Form::select('main_menu', ['0' => 'Sin publicar', '1' => 'Publicado', ], ) !!} 
                    <label for="main_menu">Menú Principal</label>
                </div>
                <div class="input-field col s3">
                    {!! Form::select('top_menu', ['0' => 'Sin publicar', '1' => 'Publicado', ],) !!} 
                    <label for="top_menu">Menú Superior</label>
                </div>
                <div class="input-field col s3">
                    {!! Form::select('footer_menu', ['0' => 'Sin publicar', '1' => 'Publicado', ],) !!} 
                    <label for="footer_menu">Menú Footer</label>
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
