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
            <h5>Información completa de la sala</h5>
        </div>
        <div class="col s6 form-right-align" >
            <a href="{{ route('sala.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <form class="col s12" action="{{ route('sala.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Nombre" name="name" type="text" class="validate">
                    <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Link" name="link" type="text" class="validate">
                    <label for="first_name">Link</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <select name="publicado" required>
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="0">Sin Publicar</option>
                        <option value="1">Publicada</option>
                      </select>
                    <label>Estado Sala</label>
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
