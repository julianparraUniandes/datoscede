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
            <h5>Información completa de la descarga</h5>
        </div>
        <div class="col s6 form-right-align" >
            <a href="{{ route('descarga.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="input-field col s4">
                    <input required placeholder="Nombre DB *" name="name" type="text" class="validate" value="{{$descarga->created_at}}" disabled>
                    <label for="first_name">Fecha</label>
                </div>
                <div class="input-field col s4">
                    <input required placeholder="Name DB *" name="lastName" type="text" class="validate" value="{{$descarga->version_metadata}}" disabled>
                    <label for="first_name">Version</label>
                </div>
                <div class="input-field col s4">
                    <input name="email" type="text" class="validate" value="{{$descarga->tipo_usr}}" disabled>
                    <label for="first_name">Tipo de usuario</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input required placeholder="Email *" name="email" type="text" class="validate" value="{{$descarga->nombre_metadata}}" disabled>
                    <label for="first_name">Nombre de la base de datos</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input name="name" type="text" class="validate" value="{{$descarga->user_name}}" disabled>
                    <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s3">
                    <input name="lastName" type="text" class="validate" value="{{$descarga->user_lastname}}" disabled>
                    <label for="first_name">Apellido</label>
                </div>
                <div class="input-field col s6">
                    <input name="email" type="text" class="validate" value="{{$descarga->user_email}}" disabled>
                    <label for="first_name">E-Mail</label>
                </div>
                
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="email" type="text" class="validate" value="{{$descarga->motivo}}" disabled rows="3">
                    <label for="first_name">Motivo de la descarga</label>
                </div>
            </div>               
            <div class="row">
                <div class="col s10 talignCenter" >                    
                    <a href="{{ route('descarga.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Volver </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')

<script src="{{ asset('js/g/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('js/g/materialize.js') }}"></script>


@endsection
