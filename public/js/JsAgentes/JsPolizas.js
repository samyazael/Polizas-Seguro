var route = document.querySelector("[name=route]").value;
var urlpoliza = route + '/polizas';
var urlAseguradoras = route + '/aseguradoras';
var urlTiposPolizas = route + '/tipoPolizas';
var urlasegurado = route + '/asegurado';


new Vue ({
  http:{
     headers:{
         'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     }  
   },
   el: '#polizas',
    created:function(){
      this.getpolizas();
      this.getAseguradoras();
      this.getTiposPolizas();
      this.getAsegurados();

    
    },
    mounted:function(){
       this.clavePoliza();
     },
    data:{
      //arrays para los datos de la poliza //
        numero_poliza:'',
        fecha_inicio:'',
        fecha_vigencia:'',
        personas_aseguradas:'',
        precio:'',
        estado_poliza:'',
        id_agente:'',
        id_tipo_poliza:'',
        id_tipo_aseguradora:'',
        infoPoliza:[],

        id_agente:'',
        id_asegurado:'',
        nombre:'',
        apellido_p:'',
        apellido_m:'',
        edad:'',

      //termina los arrays para los datos de la poliza //

      // arrays para los datos del tipo de poliza//
         id_tipo_poliza:'',
         nombre_poliza:'',
         infoTipoPolizas:[],
      // Termina el array del tipo de poliza //

      // arrays para los datos de la aseguradora//
         id_tipo_aseguradora:'',
         nombre_aseguradora:'',
         infoAseguradora:[],
      // Termina el arrar de los datos de la aseguradora //

      //array para mostrar la lista de los asegurados//
         infoAsegurado:[],
         id_asegurado:''
      //Termina el array para la lista de los asegurados//
    }, 
    methods: {
      
        getpolizas: function(){
            this.$http.get(urlpoliza).then(function(response){
                this.infoPoliza = response.data;
            });
        },

        getAseguradoras: function(){
            this.$http.get(urlAseguradoras).then(function(response){
                this.infoAseguradora = response.data;
            }).catch(function(response){
                console.log(response);
            });
        },

        getTiposPolizas: function(){
            this.$http.get(urlTiposPolizas).then(function(response){
                this.infoTipoPolizas = response.data;
            }).catch(function(response){
                console.log(response);
            });
        },
        
        getAsegurados: function(){
            this.$http.get(urlasegurado).then(function(response){
                this.infoAsegurado = response.data;
            }).catch(function(response){
                console.log(response);
            });
        },


     //aqui terminan los metodos para los registros del cliente//

     //Funcion para mostrar los datos de un cliente en un modal//
        //  showCliente:function(id)
        // {
        //   this.edit = true
        //   this.$http.get(urlcliente + '/' + id).then
        //   (function(response){
        //     console.log(response);
        //      this.id_cliente = response.data.id_cliente
        //      this.nombre = response.data.nombre
        //      this.apellido_p = response.data.apellido_p
        //      this.apellido_m = response.data.apellido_m
        //      this.email = response.data.email
        //     $('#editarCliente').modal('show');
        //   });
        // },

        //Aqui termina la funcion para mostrar los datos de un cliente//

      //Inician los metodos para los clientes //
       
       //Funcion para obtner el ID de un cliente //
       clavePoliza: function(){
        this.numero_poliza = 'POLI' + '-' + moment().format('YYMMDDhmmss');
       },
       // Termina la función para obtner el ID de un cliente///
       
       // Función para actualizar los datos de un cliente //
       // ActualizarCliente:function(){
       //     var cliente  = {
       //        nombre: this.nombre,
       //        apellido_p: this.apellido_p,
       //        apellido_m: this.apellido_m,
       //        email: this.email
       //    };
       //    console.log(cliente);
       //    this.$http.patch(urlcliente +'/' + this.id_cliente,cliente).then
       //    (function(response){
       //        this.getcliente();
       //        toastr.success('Cambios realizados con Exito');
       //        console.log(response);
       //    });
       //    this.edit = false;
       //    $('#editarCliente').modal('hide');
       // },

       //Aquí termina la función para actualizar los datos de un cliente//

       //Funcion para registrar un nuevo cliente//
        guardarPoliza:function(){

              var poliza  = {
              numero_poliza: this.numero_poliza,
              fecha_inicio : this.fecha_inicio,
              fecha_vigencia: this.fecha_vigencia,
              precio: this.precio,
              estado_poliza: this.estado_poliza,
              id_agente: this.id_agente,
              id_tipo_poliza: this.id_tipo_poliza,
              id_tipo_aseguradora: this.id_tipo_aseguradora,
              id_asegurado: this.id_asegurado
          }
          //console.log(poliza);
          this.$http.post(urlpoliza,poliza).then(function(data){
               toastr.success('Poliza Registrado Con Exito');
               console.log(data);
                this.getpolizas();
                this.fecha_inicio ="";
                this.fecha_vigencia = "";
                this.precio = "";
                this.estado_poliza = "";
                this.id_agente = "";
                this.id_tipo_poliza = "";
                this.id_tipo_aseguradora = "";
                this.id_asegurado;
            });
        }
     //Aquí termina la función para registrar un cliente //

     //Funcion para eliminar el registro de un cliente ///
       //  eliminarCliente:function(cliente){
       //      this.$http.delete(urlcliente +'/' + cliente.id_cliente).then(response =>{
       //          this.getcliente();
       //          toastr.success('Cliente eliminado con exito');
       //      });
       // }

       //Aqui termina la funcion para eliminar un cliente//
    
    }

});