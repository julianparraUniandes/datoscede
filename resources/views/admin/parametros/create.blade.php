@extends('layouts.gestor')

@section('titulo')

@endsection
@section('btnCrear')
<a href="{{ route('requisitos.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Volver</a>
@endsection
@section('contenido')



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

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Crear requisito</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('requisitos.store') }}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}
            

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre"  class="form-control" placeholder="nombre">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Texto:</strong>
                        <textarea class="form-control htextArea" name="texto" placeholder="Detail"></textarea>
                    </div>

                </div>
                <div class="form-group col-md-12">
                    <label for="imgPath">Imagen</label>
                    <input type="file" name="imgPath" value="">
                   
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection