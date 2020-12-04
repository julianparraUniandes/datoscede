@extends('layouts.gestor')

@section('titulo')

@endsection
@section('btnCrear')

@endsection
@section('contenido')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Listado de requisitos</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(sizeof($parametros) > 0)
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Atributo</th>
              <th>Valor</th>
              
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($parametros as $parametro)
            <tr>
                <td>{{ $parametro->texto_banner }}</td>
                <td>{{ $parametro->texto_requisitos_titulo }}</td>
                
                <td>
                    <form action="{{ route('parametros.destroy',$parametro->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('parametros.show',$parametro->id) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('parametros.edit',$parametro->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
            <div class="alert alert-alert">Agregue datos</div>
        @endif
      </div>
    </div>
  </div>

    {!! $parametros->links() !!}

@endsection

@section('javascript')

    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection