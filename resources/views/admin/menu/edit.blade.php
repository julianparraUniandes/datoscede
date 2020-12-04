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
            <h5>Datos del Botón</h5>
        </div>
        <div class="col s6 form-right-align" >
            <a href="{{ route('menu.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <form class="col s12" action="{{route('menu.update', $menu->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }} 
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Texto" name="name" type="text" class="validate" value="{{$menu->name}}">
                    <label for="name">Texto</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Texto (En)" name="name_en" type="text" class="validate" value="{{$menu->name_en}}">
                    <label for="name_en">Texto</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Link" name="link" type="text" class="validate" value="{{$menu->link}}">
                    <label for="link">Link</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Orden" name="orden" type="text" class="validate" value="{{$menu->orden}}">
                    <label for="orden">Orden</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">                    
                    {!! Form::select('target', ['_self' => '_self', '_blank' => '_blank'], $menu->target) !!}  
                    {{ Form::label('target','Target') }}
                </div>
                <div class="input-field col s3">
                    {!! Form::select('main_menu', ['0' => 'Sin publicar', '1' => 'Publicado', ],$menu->main_menu ) !!} 
                    <label for="main_menu">Menú Principal</label>
                </div>
                <div class="input-field col s3">
                    {!! Form::select('top_menu', ['0' => 'Sin publicar', '1' => 'Publicado', ],$menu->top_menu ) !!} 
                    <label for="top_menu">Menú Superior</label>
                </div>
                <div class="input-field col s3">
                    {!! Form::select('footer_menu', ['0' => 'Sin publicar', '1' => 'Publicado', ],$menu->footer_menu ) !!} 
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
