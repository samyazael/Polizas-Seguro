<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--TOKEN PARA CAMBIOS--}}
    <meta name="token" id="token" value="{{ csrf_token() }}">
    {{--META PARA RUTA DINAMICA--}}
    <meta name="route" id="route" value="{{url('/')}}">
    
    <title>@yield('title','Default') | sitio administracion</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}"> -->
    
     <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/plantilla/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/plantilla/fontawesome-all.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/plantilla/bootadmin.min.css')}}">
     <link rel="stylesheet" href="{{ asset('css/plantilla/fondo.css')}}">
   
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
   
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->

    <script src="{{ asset('js/vue.js') }}"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.js"></script> -->

    <script src="{{ asset('js/vue-resource.js') }}"></script>

     <link rel="stylesheet" href="{{ asset('css/toastr.css')}}">

    
</head>
<body>
   
   <section>
       @yield('contenido')
   </section>
    
    <script src="{{ asset('plugins/boostrap/js/bootstrap.js')}}"></script>
    <script src="{{ asset('plugins/boostrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery/jquery-3.4.1.js')}}"></script>
    
   <!--  <script src="{{ asset('js/listar.js') }}"></script>
    <script src="{{ asset('js/asignacion.js') }}"></script>
     -->
     <script src="{{asset('js/toastr.js')}}"></script>
     
     <script src="{{asset('js/jquery.js')}}"></script>

     <script src="{{asset('js/popper.min.js')}}"></script>

     <!-- <script src="{{asset('js/bootstrap.min.js')}}"></script> -->

     @stack('scripts')

     <script src="{{asset('js/plantilla/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('js/plantilla/bootadmin.min.js')}}"></script>
     <script src="http://malsup.github.com/jquery.form.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
   
</body>
</html>