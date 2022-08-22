var route = document.querySelector("[name=route]").value;
var urlasegurado = route + '/asegurado';


new Vue ({
  http:{
     headers:{
         'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     }  
   },
   el: '#asegurados',
    created:function(){
      this.getasegurados();
    
    },
    mounted:function(){
       
       this.claveAsegurado();
    
     },
    data:{
      //arrays para los datos del cliente //
        id_agente:'',
        id_asegurado:'',
        nombre:'',
        apellido_p:'',
        apellido_m:'',
        edad:'',
        infoAsegurado:[],
        id_asegurados:''
      //termina los arrays para los datos del cliente //
    }, 
    methods: {
      
        getasegurados: function(){
            this.$http.get(urlasegurado).then(function(response){
                this.infoAsegurado = response.data;
            });
        },
     //aqui terminan los metodos para los registros del cliente//

     //Funcion para mostrar los datos de un cliente en un modal//
         showAsegurado:function(id)
        {
          this.edit = true
          this.$http.get(urlasegurado + '/' + id).then
          (function(response){
            console.log(response);
             this.id_asegurado = response.data.id_asegurado
             this.nombre = response.data.nombre
             this.apellido_p = response.data.apellido_p
             this.apellido_m = response.data.apellido_m
             this.edad = response.data.edad
            $('#editarAsegurado').modal('show');
          });
        },

        //Aqui termina la funcion para mostrar los datos de un cliente//

      //Inician los metodos para los clientes //
       
       //Funcion para obtner el ID de un cliente //
       claveAsegurado: function(){
        this.id_asegurado = 'ASE' + '-' + moment().format('YYMMDDhmmss');
         
       },
       // Termina la función para obtner el ID de un cliente///
       
       // Función para actualizar los datos de un cliente //
       ActualizarAsegurado:function(){
           var asegurado  = {
              nombre: this.nombre,
              apellido_p: this.apellido_p,
              apellido_m: this.apellido_m,
              edad: this.edad
          };
          console.log(asegurado);
          this.$http.patch(urlasegurado +'/' + this.id_asegurado,asegurado).then
          (function(response){
              this.getasegurados();
              toastr.success('Cambios realizados con Exito');
              console.log(response);
          });
          this.edit = false;
          $('#editarAsegurado').modal('hide');
       },

       //Aquí termina la función para actualizar los datos de un cliente//

       //Funcion para registrar un nuevo cliente//
        guardarAsegurado:function(){
              var asegurado  = {
              id_asegurado: this.id_asegurado,
              nombre : this.nombre,
              apellido_p: this.apellido_p,
              apellido_m: this.apellido_m,
              edad: this.edad
          }
          console.log(asegurado);
          
          this.$http.post(urlasegurado,asegurado).then(function(data){
                toastr.success('Asegurado Registrado Con Exito');
                console.log(data);
                this.getasegurados();
                this.nombre ="";
                this.apellido_p = "";
                this.apellido_m = "";
                this.edad = "";
            });
        },
     //Aquí termina la función para registrar un cliente //

     //Funcion para eliminar el registro de un cliente ///
        eliminarAsegurado:function(asegurado){
            this.$http.delete(urlasegurado +'/' + asegurado.id_asegurado).then(response =>{
                this.getasegurados();
                toastr.success('Asegurado eliminado con exito');
            });
       }

       //Aqui termina la funcion para eliminar un cliente//
    }
});