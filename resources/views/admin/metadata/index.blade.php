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
            <h5 class="left-align">Listado de Metadata</h5>
          </div>
        </div>
        <div class="col s12">        
          @if(sizeof($metadatas) > 0)
          <table id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Tos</th>
                <th>Tema</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Vistas</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($metadatas as $metadata)
              <tr>
                  <td>{{ $metadata->name }}</td>
                  <td>{{ $metadata->tos->name }}</td>
                  <td>{{ $metadata->temas->name }}</td>
                  <td>{{ $metadata->ano_desde }}</td>
                  <td>{{ $metadata->ano_hasta }}</td>
                  <td>{{ $metadata->vistas }}</td>
                  <td>
                      <form action="{{ route('metadata.destroy',$metadata->id) }}" method="POST">
                          <a class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu" href="{{ route('metadata.edit',$metadata->id) }}">Editar</a>
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
    <script src="{{ asset('js/g/datatables/datatables.min.js') }}"></script>

     <script>
      $(document).ready(function() {
          $('#dataTable').DataTable({
            searching: true, 
            paging: false, 
            info: false, 
            pageLength: 200,
              language: {
                  "sProcessing": "Procesando...",
                  "sLengthMenu": "Mostrar _MENU_ registros",
                  "sZeroRecords": "No se encontraron resultados",
                  "sEmptyTable": "Ningún dato disponible en esta tabla",
                  "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix": "",
                  "sSearch": "Buscar:",
                  "sUrl": "",
                  "sInfoThousands": ",",
                  "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                      "sFirst": "Primero",
                      "sLast": "Último",
                      "sNext": "Siguiente",
                      "sPrevious": "Anterior"
                  },
                  "oAria": {
                      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  },
                  "buttons": {
                      "copy": "Copiar",
                      "colvis": "Visibilidad"
                  }
              }
          });
      });
  </script>
@endsection