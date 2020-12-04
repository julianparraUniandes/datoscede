@extends('layouts.admin')
@section('contenido')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif
<div class="container">
  <div class="subMenu">
      <div class="row">
        <div class="col s12">
          <div class="row">
            <h5 class="left-align">Listado de Redes</h5>
            <div class="col s6 form-right-align" >
              <a href="{{ route('rede.create') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Nuevo</a>
            </div> 
          </div>
                 
          @if(sizeof($redes) > 0)
          <table id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>link</th>
                <th>Imagen</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($redes as $rede)
              <tr>
                  <td>{{ $rede->name }}</td>
                  <td>{{ $rede->link }}</td>
                  <td><img width="100px" src="{{ Storage::url($rede->imgPath )}}"></td>
                  <td>
                      <form action="{{ route('rede.destroy',$rede->id) }}" method="POST">
                          <a class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu" href="{{ route('rede.edit',$rede->id) }}">Editar</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Borrar</button>
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
</div>
@endsection

@section('javascript')
    <script src="{{ asset('js/g/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/g/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({searching: true, paging: false, info: false, pageLength: 50 });
        });
    </script>
@endsection