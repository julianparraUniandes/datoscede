@extends('layouts.admin')
@section('contenido')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
<div class="formulario container">
    <div class="row">
        <div class="col s6 form-left-align" >
            <h5>Información completa de la red</h5>
        </div>
        <div class="col s6 form-right-align" >
            <a href="{{ route('rede.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <form class="" action="{{route('rede.update', $rede->id)}}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            {{ method_field('put') }} 
            <div class="row">
                <div class="input-field col s6">
                    <input required id="name" type="text" class="validate" value="{{$rede->name}}" name="name">
                    <label for="name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input required id="link" type="text" class="validate" value="{{$rede->link}}" name="link">
                    <label for="link">link</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="file" name="imgPath" value="">
                    @if(isset($rede->imgPath))                    
                    <img width="100px" src="{{ Storage::url($rede->imgPath)}}">
                    @endif
                    <label>Imagen</label>
                </div>
            </div>
            <div class="row">
                <div class="col s10 talignCenter" >                    
                    <button type="submit" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('javascript')

<script src="{{ asset('js/g/materialize.js') }}"></script>


@endsection
