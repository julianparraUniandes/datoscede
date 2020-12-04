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
        <div class="col s9 form-left-align" >
            <h5>Información completa del usuario</h5>
        </div>
        <div class="col s3 form-right-align" >
            <a href="{{ route('usuario.index') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">VOLVER</a>
        </div>
    </div>
    <form class="" action="{{route('usuario.update', $usuario->id)}}" method="post" enctype="multipart/form-data" >
        {{ csrf_field() }}
        {{ method_field('put') }}
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="input-field col s3">
                    <input name="name" type="text" class="validate" value="{{$usuario->name}}" disabled>
                    <label for="name">Nombre</label>
                </div>
                <div class="input-field col s3">
                    <input name="lastName" type="text" class="validate" value="{{$usuario->lastName}}" disabled>
                    <label for="lastName">Apellido</label>
                </div>
                <div class="input-field col s6">
                    <input name="email" type="text" class="validate" value="{{$usuario->email}}" disabled>
                    <label for="email">E-Mail</label>
                </div>
                
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="company" type="text" class="validate" value="{{$usuario->company}}" disabled>
                    <label for="company">Institución</label>
                </div>
                <div class="input-field col s3">
                    <input name="companyKind" type="text" class="validate" value="{{$usuario->companyKind}}" disabled>
                    <label for="companyKind">Tipo de institución</label>
                </div>
                <div class="input-field col s3">
                    <input required name="facultad" type="text" class="validate" value="{{$usuario->facultad}}" disabled>
                    <label for="facultad">Unidad</label>
                </div>
                
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input name="programa" type="text" class="validate" value="{{$usuario->programa}}" disabled>
                    <label for="programa">Programa</label>
                </div>
                <div class="input-field col s3">
                    <input name="doble_programa" type="text" class="validate" value="{{$usuario->doble_programa}}" disabled>
                    <label for="doble_programa">Doble programa</label>
                </div>
                
                <div class="input-field col s3">
                    <input name="tipo_usr" type="text" class="validate" value="{{$usuario->tipo_usr}}" disabled>
                    <label for="tipo_usr">Tipo de usuario</label>
                </div>
                <div class="input-field col s3">
                    {!! Form::select('role', ['1' => 'Admin', '2' => 'Profesor Facultad', '3' => 'Estudiante Facultad', '4' => 'Estudiante / Administrativo', '5' => 'Usuario Externo'], $roleUsuario->role_id) !!} 
                    <label for="role">Rol</label>
                </div>                
            </div>              
            <div class="row">
                <div class="col s12 talignCenter" >                    
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
