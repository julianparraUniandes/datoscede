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
        <form class="col s12" action="{{route('sala.update', $sala->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }} 
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Nombre *" name="name" type="text" class="validate" value="{{$sala->name}}">
                    <label for="name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Link *" name="link" type="text" class="validate" value="{{$sala->link}}">
                    <label for="link">Apellido</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    {!! Form::select('publicado', ['0' => 'Sin Publicar', '1' => 'Publicada'], $sala->publicado) !!}  
                    {{ Form::label('publicado','Estado de la Sala:') }}
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
