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
            <h5 class="left-align">Ítems del menú</h5>
          </div>
          <div class="col s6 form-right-align" >
            <a href="{{ route('menu.create') }}" class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu">Nuevo</a>
        </div>
        </div>
        <div class="col s12">        
          @if(sizeof($menus) > 0)
          <table id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Nombre (En)</th>
                <th>URL</th>
                <th>Target</th>
                <th>Orden</th>
                <th>Menu Principal</th>
                <th>Menu Superior</th>
                <th>Menu Footer</th>
                
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menus as $menu)
              <tr>
                  <td>{{ $menu->name }}</td>
                  <td>{{ $menu->name_en }}</td>
                  <td>{{ $menu->link }}</td>
                  <td>{{ $menu->target }}</td>
                  <td>{{ $menu->orden }}</td>
                  @if($menu->main_menu === 1)
                  <td>                                                        
                    <i class="material-icons">check_box</i>
                  </td>
                  @else
                  <td>                                                        
                    <i class="material-icons">check_box_outline_blank</i>
                  </td>
                  @endif
                  @if($menu->top_menu === 1)
                  <td>                                                        
                    <i class="material-icons">check_box</i>
                  </td>
                  @else
                  <td>                                                        
                    <i class="material-icons">check_box_outline_blank</i>
                  </td>
                  @endif
                  @if($menu->footer_menu === 1)
                  <td>                                                        
                    <i class="material-icons">check_box</i>
                  </td>
                  @else
                  <td>                                                        
                    <i class="material-icons">check_box_outline_blank</i>
                  </td>
                  @endif
                  <td>
                      <form action="{{ route('menu.destroy',$menu->id) }}" method="POST">
                          <a class="sidenav-trigger waves-effect light-blue darken-4 btn white-text btnManu" href="{{ route('menu.edit',$menu->id) }}">Editar</a>
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