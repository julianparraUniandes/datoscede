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
            <h5 class="left-align">Listado de Profesores</h5>
          </div>
        </div>
        <div class="col s12">        
          @if(sizeof($profesores) > 0)
          <table id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($profesores as $profesor)
              <tr>
                  <td>{{ $profesor->name }}</td>
                  <td>{{ $profesor->lastName }}</td>
                  <td>{{ $profesor->email }}</td>
                  @if($profesor->publicado === 1)
                  <td>                                                        
                      Publicado
                  </td>
                  @else
                  <td>                                                        
                      Sin Publicar
                  </td>
                  @endif
                  <td>
                      <form action="{{ route('profesor.destroy',$profesor->id) }}" method="POST">
                          <a class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu" href="{{ route('profesor.edit',$profesor->id) }}">Editar</a>
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