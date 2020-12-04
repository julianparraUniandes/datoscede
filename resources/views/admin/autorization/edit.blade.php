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
        <div class="col s9 form-left-align">
            <h5>Información completa de la solicitud</h5>
        </div>
        <div class="col s3 form-right-align">
            <a href="{{ route('autorization.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>
    <form class="" action="{{route('autorization.update', $autorization->id)}}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        {{ method_field('put') }}
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="input-field col s3">
                    <input name="created_at" type="text" class="validate" value="{{$autorization->created_at->format('d/m/Y')}}" disabled>
                    <label for="created_at">Fecha</label>
                </div>
                <div class="input-field col s3">
                    <input name="tipo_usr" type="text" class="validate" value="{{$autorization->tipo_user}}" disabled>
                    <label for="tipo_usr">Tipo de usuario</label>
                </div>
                <div class="input-field col s3">
                    <input name="programa" type="text" class="validate" value="{{$autorization->programa}}" disabled>
                    <label for="programa">Programa</label>
                </div>
                <div class="input-field col s3">
                    <input name="programa" type="text" class="validate" value="{{$autorization->doble_programa}}" disabled>
                    <label for="programa">Doble programa</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s9">
                    <input required placeholder="Email *" name="email" type="text" class="validate" value="{{$autorization->nombre_metadata}}" disabled>
                    <label for="first_name">Nombre de la base de datos</label>
                </div>
                <div class="input-field col s3">
                    {!! Form::select('estado', ['0' => 'Pendiente', '1' => 'Autorizado', '2' => 'Denegado'], $autorization->estado) !!} 
                    <label for="first_name">Autorización</label>
                </div>
                
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input name="name" type="text" class="validate" value="{{$autorization->name}}" disabled>
                    <label for="first_name">Nombre</label>
                </div>
                <div class="input-field col s3">
                    <input name="lastName" type="text" class="validate" value="{{$autorization->surname}}" disabled>
                    <label for="first_name">Apellido</label>
                </div>
                <div class="input-field col s6">
                    <input name="email" type="text" class="validate" value="{{$autorization->email}}" disabled>
                    <label for="first_name">E-Mail</label>
                </div>
                
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="email" type="text" class="validate" value="{{$autorization->descripcion}}" disabled rows="3">
                    <label for="first_name">Motivo de la descarga</label>
                </div>
            </div>              
            <div class="row">
                <div class="input-field col s6">
                    <input name="auth_email" type="text" class="validate" value="{{$autorization->mail_auth}}" disabled>
                    <label for="auth_email">Solicitud realizada a:</label>
                </div>
                <div class="col s6 talignCenter">                    
                    <button type="submit" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
@section('javascript')

<script src="{{ asset('js/g/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('js/g/materialize.js') }}"></script>


@endsection
