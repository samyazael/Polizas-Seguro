<div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li><a href="#"><i class="fa fa-fw fa-home fa-lg"></i> Inicio</a></li>
            <li>
                <a href="#sm_expand_1" data-toggle="collapse">
                    <i class="fa fa-fw fa-user"></i> Mis Datos
                </a>
                <ul id="sm_expand_1" class="list-unstyled collapse">
                    <li><a href="{{url('adminE/perfil')}}"> Perfil</a></li>
                </ul>
            </li>
            <li>
                <a href="#sm_expand_2" data-toggle="collapse">
                 <i class="fa fa-plus-square"></i> Registrar Proyecto</a>
                 <ul id="sm_expand_2" class="list-unstyled collapse">
                    <li><a href="{{url('adminE/proyecto')}}"> Proyecto</a></li>
                     <li><a href="{{url('adminE/organizacion')}}">Actualizar Empresa</a></li>
                    <li><a href="{{url('adminE/asesor')}}"> Actualizar Asesor Empresarial</a></li>
                </ul>
            </li>
            
            <li>
                <a href="#sm_expand_3" data-toggle="collapse">
                 <i class="fa fa-book"></i> Formatos</a>
                 <ul id="sm_expand_3" class="list-unstyled collapse">
                    <li><a href="{{url('adminE/descarga')}}"> Descargas de Formatos</a></li>
                    <li><a href="{{url('adminE/organizacion')}}"> Subir Formatos</a></li>
                </ul>
            </li>

            <li><a href="{{url('adminE/seguimiento')}}"><i class="fa fa-fw fa-list"></i> Seguimiento</a></li>
            <li><a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i> Salir</a></li>
        </ul>
</div>