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
            <h5>Información completa del profesor</h5>
        </div>
        <div class="col s6 form-right-align" >
            <a href="{{ route('profesor.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>

    <div class="row">
        <form class="col s12" action="{{route('profesor.update', $profesor->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }} 
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Nombre DB *" name="name" type="text" class="validate" value="{{$profesor->name}}">
                    <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input required placeholder="Name DB *" name="lastName" type="text" class="validate" value="{{$profesor->lastName}}">
                    <label for="first_name">Apellido</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input required placeholder="Email *" name="email" type="text" class="validate" value="{{$profesor->email}}">
                    <label for="first_name">Email</label>
                </div>
                <div class="input-field col s6">
                    {!! Form::select('publicado', ['0' => 'Sin publicar', '1' => 'Publicado', ],$profesor->publicado ) !!} 
                    <label for="publicado">Publicado</label>
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
