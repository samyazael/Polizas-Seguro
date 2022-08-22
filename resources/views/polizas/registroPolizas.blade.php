@extends('admin.template.main')

@section('title')
Registro de Polizas
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
                <a href="#sm_expand_2" data-toggle="collapse">
                 <i class="fa fa-address-book"></i> Polizas</a>
                 <ul id="sm_expand_2" class="list-unstyled collapse">
                    <li><a href="{{url('registropoliza/registrarpoliza')}}">Registro de Polizas</a></li>
                    <li><a href="{{url('asignacionpoliza/asginacionpolizas')}}">Asignación de polizas</a></li>
                </ul>
            </li>
            <li><a href="{{url('logout')}}"><i class="fa fa-fw fa-power-off"></i> Salir</a></li>
        </ul>
    </div>
<div class="content p-4">
        <h2> Registro de Polizas </h2>
            <p>En esta seccion podras dar de alta a un cliente llenando los campos establecidos en el registro.
            </p>
        <div class="card mb-4">
            <div class="card-body">
                <h3>Registro de Polizas</h3>
                
                <form> 

                <div class="form-group">
                    <h5>clave de la Poliza: @{{(numero_poliza)}} </h5>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="FechaInicio">Fecha de Inicio</label>
                      <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" v-model="fecha_inicio" placeholder="Escribe la fecha en que iniciar el contrato de la poliza">
                      <small  class="form-text text-muted">Ejemplo:21/08/2022.</small>
                  </div>
                   <div class="form-group col-md-6">
                      <label for="FechaVigencia">Fecha de vigencia</label>
                      <input type="date" class="form-control" id="fecha_vigencia"  name="fecha_vigencia" v-model="fecha_vigencia" placeholder="Escribe la fecha en que terminara el contrato de la poliza">
                      <small  class="form-text text-muted">Ejemplo:21/08/2022.</small>
                  </div>
                </div>
                 <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="PersonasAseguradas">Nombre de la persona que sera asegurado</label>
                      <select class="custom-select" v-model="id_asegurado">
                          <option selected>Selecciona Uno</option>
                          <option v-for = "asegurado in infoAsegurado" v-bind:value="asegurado.id_asegurado">@{{(asegurado.nombre)}} @{{(asegurado.apellido_p)}} @{{(asegurado.apellido_m)}}
                          </option>
                        </select>
                      <small  class="form-text text-muted">Juan Salinas.</small>
                  </div>
                   <div class="form-group col-md-6">
                    <label>Sí el asegurado no existe, hacer click en agregar</label><br>
                     <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#registrarAsegurado"> &nbsp; &nbsp; Registrar nuevo &nbsp;  <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;</button>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="Precio">Precio de la poliza</label>
                      <input type="number" type="number" min="1" step="any" class="form-control" id="precio"  name="precio" v-model="precio" placeholder="Escribe el precio de la poliza">
                      <small  class="form-text text-muted">Ejemplo: 150.</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombreEmpresa">Estado de la poliza</label>
                        <select class="custom-select" v-model="estado_poliza">
                          <option selected>Selecciona Uno</option>
                          <option>Vigente</option>
                          <option>En Proceso</option>
                          <option>Baja</option>
                        </select>
                        <small  class="form-text text-muted">Selecciona el estado en que se encuentra la poliza.</small>
                    </div>
                     
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombreEmpresa">Aseguradora</label>
                        <select class="custom-select" v-model="id_tipo_aseguradora">
                          <option selected>Selecciona Uno</option>
                          <option v-for = "ase in infoAseguradora" v-bind:value="ase.id_tipo_aseguradora">@{{(ase.nombre_aseguradora)}}
                          </option>
                        </select>
                        <small  class="form-text text-muted">Selecciona el nombre de la aseguradora.</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="razonSocial">Tipo de poliza</label>
                        <select class="custom-select" v-model="id_tipo_poliza">
                          <option selected>Selecciona Uno</option>
                          <option v-for = "tipo in infoTipoPolizas" v-bind:value="tipo.id_tipo_poliza">@{{(tipo.nombre_poliza)}}
                          </option>
                        </select>
                        <small  class="form-text text-muted">Ejemplo: Gastos Medicos</small>
                     </div>
                </div>
        </form>
             <div class="form-group">
                    <button @click="guardarPoliza()" class="btn btn-primary btn-block"  type="submit"> &nbsp; &nbsp; Agregar nueva poliza &nbsp;  <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;</button>
                </div>
                
            </div>
        </div>
</div>
</div>
</div>

<!-- modal para agregar una nueva poliza -->

<!-- modal para agregar un nuevo cliente -->


<!-- modal para agregar aun asegurado -->
<div id="asegurados">
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
</div>

<!-- aqui terminar el modal para agregar un cliente -->


@endsection

@push('scripts')
  <script src="{{ asset('js/JsAgentes/JsPolizas.js') }}"></script>
  <script src="{{ asset('js/JsAgentes/JsAsegurados.js') }}"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">