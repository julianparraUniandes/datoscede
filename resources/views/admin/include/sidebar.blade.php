
    <div class="col s0 m3">
        <ul id="slide-out" class="collapsible sidenav sidenav-fixed">
            <li>
                <div class="user-view">
                    <a href="#user" class="imgcircleIMG"><img class="circleIMG" src="{{ asset('img/logo_color.png') }}" height="85"></a>
                </div>
            </li>
            <li><a href="#!"><span>OPCIONES</span></a></li>
            <li>
                <div class="collapsible-header"><i class="material-icons">archive</i>BASES DE DATOS</div>
                <div class="collapsible-body">
                <ul>
                    <li><a href="{{route('metadata.index')}}"><span class="itemSubMenu">Listado</span></a></li>
                    <li><a href="{{route('metadata.create')}}"><span class="itemSubMenu">Crear</span></a> </li>       
                </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">cloud_download</i>AUTORIZAR DESCARGAS</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{route('autorization.index')}}"><span class="itemSubMenu">Solicitudes</span></a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">face</i>ADMINISTRAR USUARIOS</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{route('usuario.index')}}"><span class="itemSubMenu">Editar Usuario</span></a></li>
                        <li><a href="{{route('profesor.create')}}"><span class="itemSubMenu">Crear Profesor</span></a></li>
                        <li><a href="{{route('profesor.index')}}"><span class="itemSubMenu">Editar Profesor</span></a></li>

                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">insert_chart</i>CONSULTAR REPORTES</div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{route('descarga.index')}}"><span class="itemSubMenu">Descargas</span></a></li>
                        <li><a href="{{route('inconsistencia.index')}}"><span class="itemSubMenu">Inconsistencias</span></a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header"><i class="material-icons">place</i>ADMINISTRAR CONTENIDO</div>
                <div class="collapsible-body">
                    <ul>
                    <li><a href="{{route('temas.index')}}"><span class="itemSubMenu">Temas</span></a></li>
                    <li><a href="{{route('sala.index')}}"><span class="itemSubMenu">Salas</span></a></li>
                    <li><a href="{{route('parametros.edit', ['id' => 1])}}"><span class="itemSubMenu">Parametros</span></a></li>
                    <li><a href="{{route('rede.index')}}"><span class="itemSubMenu">Redes Sociales</span></a></li>
                    <li><a href="{{route('menu.index')}}"><span class="itemSubMenu">Menú</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
