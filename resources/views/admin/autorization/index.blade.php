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
            <h5 class="left-align">Listado de Solicitudes</h5>
          </div>
        </div>
        <div class="col s12">        
          @if(sizeof($autorizations) > 0)
          <table id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>BD</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Programa</th>
                <th>Tipo</th>
                <th>Autoriza</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($autorizations as $autorization)
              <tr>
                  <td>{{ $autorization->nombre_metadata }}</td>
                  <td>{{ $autorization->name }}</td>
                  <td>{{ $autorization->surname }}</td>
                  <td>{{ $autorization->programa }}</td>
                  <td>{{ $autorization->tipo_user }}</td>
                  <td>{{ $autorization->mail_auth }}</td>
                    @switch($autorization->estado)
                        @case(0)
                          <td>Pendiente</td>   
                        @break
                        @case(1)
                        <td>Aprobado</td> 
                            @break
                        @case(2)
                        <td>Denegado</td > 
                            @break
                        @default
                            
                    @endswitch
                    
                  <td>{{ $autorization->created_at->format('d/m/Y') }}</td>
                  <td>
                      <a class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu" href="{{ route('autorization.edit',$autorization->id) }}">Ver</a>
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