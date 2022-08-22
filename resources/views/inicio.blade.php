@extends('admin.template.main')

@section('title')
Panel de administración - Agentes
@endsection

@section('contenido')
<div class="d-flex">
   <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li><a href="{{url('Inicio/paginaInicio')}}"><i class="fa fa-fw fa-home fa-lg"></i> Inicio</a></li>
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
                 <i class="fa fa-address-book"></i> Clientes y Asegurados</a>
                 <ul id="sm_expand_2" class="list-unstyled collapse">
                    <li><a href="{{url('Cliente/altaClientes')}}"> Administración Clientes</a></li>
                    <li><a href="{{url('Asegurado/altaAsegurados')}}">Administración Asegurados</a></li>
                </ul>
            </li>
            <li>
                <a href="#sm_expand_3" data-toggle="collapse">
                 <i class="fa fa-address-book"></i> Polizas</a>
                 <ul id="sm_expand_3" class="list-unstyled collapse">
                    <li><a href="{{url('registropoliza/registrarpoliza')}}">Registro de Polizas</a></li>
                    <li><a href="{{url('asignacionpoliza/asginacionpolizas')}}">Asignación de polizas</a></li>
                </ul>
            </li>
            <li><a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i> Salir</a></li>
        </ul>
    </div>

    <div class="content p-4">
        <h2 class="mb-4">Inicio</h2>

        <div class="card mb-4">
            <div class="card-body">
               <h2> Mis ultimos movimientos <h2>
                
            </div>
        </div>
    </div>
</div>

@endsection
<input type="hidden" name="route" value="{{url('/')}}">