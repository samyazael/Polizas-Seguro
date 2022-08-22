@extends('admin.template.mainlogin')

@section('title')
Inicio de Sesion
@endsection

@section('contenido')

<div id="login">
 <!--  <h1>@{{nombre}}</h1> -->

    <div class="container p-4 col-md-4 offset-md-4 mt-5">
       <h1 class="my-3 text-center">Iniciar Sesión</h1>
        <div class="card mb-4">
            <div class="card-body">
              <form action="{{url('validar')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="usuario">Usuario</label>
                  <input type="text"  class="form-control" id="user" name="user" placeholder="Escribe el usuario de tu cuenta">
                </div>
                <div class="form-group">
                  <label for="pass">Contraseña</label>
                  <input type="password" class="form-control" id="contrasenia" name="pass" placeholder="Escribe tú contraseña">
                </div>
                <button type="submit"  class="btn btn-primary">Enviar</button>
              </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
  <script src="{{ asset('js/Jslogin.js') }}"></script>
@endpush

