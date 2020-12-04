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
            <a href="{{ route('temas.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <form class="" action="{{route('temas.store')}}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Nombre *" id="name" type="text" class="validate" name="name">
                    <label for="name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Nombre (En) *" id="name_en" type="text" class="validate" name="name_en">
                    <label for="name_en">Nombre (En)</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Descripción</h7>
                    <textarea class="materialize-textarea" name="texto" ></textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h7>Descripción (En)</h7>
                    <textarea class="materialize-textarea" name="texto_en" ></textarea>
                </div>
            </div>
            <div class="row">
                <div class="input-field  col s6">
                    <input type="file" name="imgPath" value="">
                    <label>Imagen</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field  col s6">
                    <input type="file" name="icon" value="">
                    <label>Imagen</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 talignCenter">                    
                    <button type="submit" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Crear</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('javascript')

<script src="{{ asset('js/g/materialize.js') }}"></script>


@endsection
