@extends('admin.template.main')

@section('title')
Alta de Asegurados
@endsection

@section('contenido')

<div id="polizas">
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
        <h2> Alta de personas aseguradas </h2>
            <p>En esta seccion podras dar de alta a una persona asegurada llenando los campos establecidos en el registro.
            </p>
        <div id="">    
        <div class="card mb-4">
            <div class="card-body">
                <h3>Lista de asegurados</h3>
                <table class="table table-hover table-sprite">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Clave</th>
                            <th>Nombre completo</th>
                            <th>Edad</th>
                            <th>Poliza</th>
                            <th>Aseguradora</th>
                            <th>Estado</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Vigencia</th>
                            <th colspan="3" align="center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="asegurado in infoPoliza">
                            <td>@{{ asegurado.id_asegurado }}</td>
                            <td>@{{ asegurado.nombre }}</td>
                            <td>@{{ asegurado.edad }}</td>
                            <td>@{{ asegurado.nombre_poliza }}</td>
                            <td>@{{ asegurado.nombre_aseguradora }}</td>
                            <td>@{{ asegurado.estado_poliza }}</td>
                            <td>@{{ asegurado.fecha_inicio }}</td>
                            <td>@{{ asegurado.fecha_vigencia }}</td>
                            <td>
                                <a href="#" @click="showAsegurado(asegurado.id_asegurado)" data-toggle="tooltip" data-placement="top" title="Editar y Actualizar datos de una persona asegurada">
                                  <i class="fa fa-pencil-square-o fa-lg"></i>
                                 </a>
                            </td>
                            <td>
                                <a href="#" @click="eliminarAsegurado(asegurado)" data-toggle="tooltip" data-placement="top" title="Eliminar registro de un cliente">
                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                 </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
</div>
</div>


<!-- modal para agregar un nuevo cliente -->

<div class="modal fade" id="registrarAsegurado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registra un nueva persona Asegurada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>  
                <div class="form-group">
                    <h5>Folio Asegurado: @{{(id_asegurado)}} </h5>
                </div>
                <div class="form-group">
                    <label for="nombreProyecto">Nombres</label>
                    <input type="text" class="form-control" id="nombre"  name="nombre" v-model="nombre" placeholder="Escribe el nombre del asegurado">
                    <small  class="form-text text-muted">Ejemplo: Juan Antonio.</small>
                </div>
                 <div class="form-group">
                    <label for="TipoProyecto">Apellido Paterno</label>
                      <input type="text" class="form-control" id="apellido_p"  name="apellido_p" v-model="apellido_p" placeholder="Escribe el apellido paterno del asegurado">
                    <small  class="form-text text-muted">Ejemplo: Cuevas.</small>
                </div>
                <div class="form-group">
                      <label for="TipoProyecto">Apellido Materno</label>
                      <input type="text" class="form-control" id="apellido_m"  name="apellido_m" v-model="apellido_m" placeholder="Escribe apellido materno del asegurado">
                    <small  class="form-text text-muted">Ejemplo: Ortiz.</small>
                </div>
                <div class="form-group">
                    <label for="TipoProyecto">Edad</label>
                      <input type="number" class="form-control" id="edad"  name="edad" v-model="edad" min="1" max="100" step="2" placeholder="Escribe la edad de la persona asegurada">
                    <small  class="form-text text-muted">Ejemplo:10.</small>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button @click="guardarAsegurado()" class="btn btn-primary" data-dismiss="modal">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Aquí termina el modal para agregar un nuevo cliente -->


<!-- modal para editar un asegurado -->

<div class="modal fade" id="editarAsegurado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar los datos de las personas aseguradas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>  
                <div class="form-group">
                    <label for="claveAsegurado">Clave del Asegurado</label>
                    <input type="text" class="form-control" id="id_asegurado"  name="id_asegurado" v-model="id_asegurado" placeholder="Escribe el nombre del cliente" disabled> 
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
                    <label for="Edad">Edad</label>
                      <input type="number" class="form-control" id="edad"  name="edad" v-model="edad" placeholder="Escribe la edad del asegurado">
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button @click="ActualizarAsegurado()" class="btn btn-primary" data-dismiss="modal">Actualizar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- aqui terminar el modal para editar un cliente -->

</div>
@endsection

@push('scripts')
  <!-- <script src="{{ asset('js/JsAgentes/JsAsegurados.js') }}"></script> -->
  <script src="{{ asset('js/JsAgentes/JsPolizas.js') }}"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">