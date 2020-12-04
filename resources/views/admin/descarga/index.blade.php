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
            <h5 class="left-align">Listado de Descargas</h5>
          </div>
          <div class="col s6 .form-right-align">
            <a href="{{route('exporta.descarga')}}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Descargar Reporte</a>
        </div>
        </div>
        <div class="col s12">        
          @if(sizeof($descargas) > 0)
          <table id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>BD</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>E-Mail</th>
                <th>Tipo de usuario</th>
                <th>Versión</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($descargas as $descarga)
              <tr>
                  <td>{{ $descarga->created_at->format('d/m/Y') }}</td>
                  <td>{{ $descarga->nombre_metadata }}</td>
                  <td>{{ $descarga->user_name }}</td>
                  <td>{{ $descarga->user_lastname }}</td>
                  <td>{{ $descarga->user_email }}</td>
                  <td>{{ $descarga->tipo_usr }}</td>
                  <td>{{ $descarga->version_metadata }}</td>
                  <td>
                      <a class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu" href="{{ route('descarga.show',$descarga->id) }}">Ver</a>
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
            pageLength: 50,
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