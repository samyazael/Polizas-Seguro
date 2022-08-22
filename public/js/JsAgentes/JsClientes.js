var route = document.querySelector("[name=route]").value;
var urlcliente = route + '/cliente';


new Vue ({
  http:{
     headers:{
         'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     }  
   },
   el: '#clientes',
    created:function(){
      this.getcliente();
    
    },
    mounted:function(){
       
       this.claveCliente();
    
     },
    data:{
      //arrays para los datos del cliente //
        id_cliente:'',
        nombre:'',
        apellido_p:'',
        apellido_m:'',
        email:'',
        infoClientes:[],
        id_agente:''
      //termina los arrays para los datos del cliente //
    }, 
    methods: {
      
        getcliente: function(){
            this.$http.get(urlcliente).then(function(response){
                this.infoClientes = response.data;
            });
        },
     //aqui terminan los metodos para los registros del cliente//

     //Funcion para mostrar los datos de un cliente en un modal//
         showCliente:function(id)
        {
          this.edit = true
          this.$http.get(urlcliente + '/' + id).then
          (function(response){
            console.log(response);
             this.id_cliente = response.data.id_cliente
             this.nombre = response.data.nombre
             this.apellido_p = response.data.apellido_p
             this.apellido_m = response.data.apellido_m
             this.email = response.data.email
            $('#editarCliente').modal('show');
          });
        },

        //Aqui termina la funcion para mostrar los datos de un cliente//

      //Inician los metodos para los clientes //
       
       //Funcion para obtner el ID de un cliente //
       claveCliente: function(){
        this.id_cliente = 'CLIE' + '-' + moment().format('YYMMDDhmmss');
         
       },
       // Termina la función para obtner el ID de un cliente///
       
       // Función para actualizar los datos de un cliente //
       ActualizarCliente:function(){
           var cliente  = {
              nombre: this.nombre,
              apellido_p: this.apellido_p,
              apellido_m: this.apellido_m,
              email: this.email
          };
          console.log(cliente);
          this.$http.patch(urlcliente +'/' + this.id_cliente,cliente).then
          (function(response){
              this.getcliente();
              toastr.success('Cambios realizados con Exito');
              console.log(response);
          });
          this.edit = false;
          $('#editarCliente').modal('hide');
       },

       //Aquí termina la función para actualizar los datos de un cliente//

       //Funcion para registrar un nuevo cliente//
        guardarCliente:function(){
              var cliente  = {
              id_cliente: this.id_cliente,
              nombre : this.nombre,
              apellido_p: this.apellido_p,
              apellido_m: this.apellido_m,
              email: this.email,
              id_agente: this.id_agente
          }
          console.log(cliente);
          
          this.$http.post(urlcliente,cliente).then(function(data){
                toastr.success('Cliente Registrado Con Exito');
                console.log(data);
                this.getcliente();
                this.nombre ="";
                this.apellido_p = "";
                this.apellido_m = "";
                this.email = "";
                this.id_agente = "";
            });
        },
     //Aquí termina la función para registrar un cliente //

     //Funcion para eliminar el registro de un cliente ///
        eliminarCliente:function(cliente){
            this.$http.delete(urlcliente +'/' + cliente.id_cliente).then(response =>{
                this.getcliente();
                toastr.success('Cliente eliminado con exito');
            });
       }

       //Aqui termina la funcion para eliminar un cliente//
    }
});