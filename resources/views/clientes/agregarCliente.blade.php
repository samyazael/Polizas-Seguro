@extends('admin.template.main')

@section('title')
Alta de clientes
@endsection

@section('contenido')

<div id="clientes">
<div hidden>
@{{id_agente="{!!Session::get('id_agente')!!}"}}
</div>
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
        <h2> Alta de clientes </h2>
            <p>En esta seccion podras dar de alta a un cliente llenando los campos establecidos en el registro.
            </p>
            <h5>folio:@{{(id_agente)}}</h5>
        <div class="card mb-4">
            <div class="card-body">
                <h3>Lista de clientes</h3>
                <table class="table table-hover table-sprite">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Email ó correo electrónico</th>
                            <th colspan="3" align="center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cliente in infoClientes">
                            <td>@{{ cliente.nombre }}</td>
                            <td>@{{ cliente.apellido_p }}</td>
                            <td>@{{ cliente.apellido_m }}</td>
                            <td>@{{ cliente.email }}</td>
                            <td>
                                <a href="#" @click="showCliente(cliente.id_cliente)" data-toggle="tooltip" data-placement="top" title="Editar y Actualizar datos de un cliente">
                                  <i class="fa fa-pencil-square-o fa-lg"></i>
                                 </a>
                            </td>
                            <td>
                                <a href="#" @click="eliminarCliente(cliente)" data-toggle="tooltip" data-placement="top" title="Eliminar registro de un cliente">
                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                 </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#registrarCliente" @click="claveCliente()"> &nbsp; &nbsp; Agregar nuevo cliente &nbsp;  <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
</div>
</div>


<!-- modal para agregar un nuevo cliente -->

<div class="modal fade" id="registrarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registra un nuevo cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>  
                <div class="form-group">
                    <h5>clave cliente: @{{(id_cliente)}} </h5>
                </div>
                <div class="form-group">
                    <label for="nombreProyecto">Nombres</label>
                    <input type="text" class="form-control" id="nombre"  name="nombre" v-model="nombre" placeholder="Escribe el nombre del cliente">
                    <small  class="form-text text-muted">Ejemplo: Juan Antonio.</small>
                </div>
                 <div class="form-group">
                    <label for="TipoProyecto">Apellido Paterno</label>
                      <input type="text" class="form-control" id="apellido_p"  name="apellido_p" v-model="apellido_p" placeholder="Escribe el apellido paterno del cliente">
                    <small  class="form-text text-muted">Ejemplo: Cuevas.</small>
                </div>
                <div class="form-group">
                      <label for="TipoProyecto">Apellido Materno</label>
                      <input type="text" class="form-control" id="apellido_m"  name="apellido_m" v-model="apellido_m" placeholder="Escribe apellido materno delo cliente">
                    <small  class="form-text text-muted">Ejemplo: Ortiz.</small>
                </div>
                <div class="form-group">
                    <label for="TipoProyecto">Email ó Correo Electronico</label>
                      <input type="text" class="form-control" id="email"  name="email" v-model="email" placeholder="Escribe el correo electrónico del cliente">
                    <small  class="form-text text-muted">Ejemplo: juan@dominio.com.</small>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button @click="guardarCliente()" @click="getcliente()" class="btn btn-primary" data-dismiss="modal">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- modal para agregar un nuevo cliente -->


<!-- modal para edditar un cliente -->

<div class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar los datos de un cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>  

                <div class="form-group">
                    <label for="id_cliente">Clave del cliente</label>
                    <input type="text" class="form-control" id="id_cliente"  name="id_cliente" v-model="id_cliente" placeholder="Escribe el nombre del cliente" disabled> 
                </div>
                <div class="form-group">
                    <label for="nombreProyecto">Nombres</label>
                    <input type="text" class="form-control" id="nombre"  name="nombre" v-model="nombre" placeholder="Escribe el nombre del cliente"> 
                </div>
                 <div class="form-group">
                    <label for="TipoProyecto">Apellido Paterno</label>
                      <input type="text" class="form-control" id="apellido_p"  name="apellido_p" v-model="apellido_p" placeholder="Escribe el apellido paterno del cliente">
                </div>
                <div class="form-group">
                      <label for="TipoProyecto">Apellido Materno</label>
                      <input type="text" class="form-control" id="apellido_m"  name="apellido_m" v-model="apellido_m" placeholder="Escribe apellido materno delo cliente">
                    
                </div>
                <div class="form-group">
                    <label for="TipoProyecto">Email ó Correo Electronico</label>
                      <input type="text" class="form-control" id="email"  name="email" v-model="email" placeholder="Escribe el correo electrónico del cliente">
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button @click="ActualizarCliente()" class="btn btn-primary" data-dismiss="modal">Actualizar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- aqui terminar el modal para editar un cliente -->

</div>
@endsection

@push('scripts')
  <script src="{{ asset('js/JsAgentes/Jsclientes.js') }}"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">