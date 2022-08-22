 
//new Vue({
//   el: '#ejemplo1',
//   data: {
//       alumnos: [
//           'Samy',
//           'Angel',
//           'Tomas'
//       ],
//   }
//});



var urlPrueba = 'actividades';
new Vue({
   http:{
     headers:{
         'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     }  
   },
   el: '#ejemplo',
   created: function() {
      this.getNombres();  
   },
    
   data: {
       nombres: [],
       newActividad:{
        nombre_actividad:'',
        fecha:'',
        hora1:'',
        lugar:'',
        id_actividades:''
       },
      edit:false,
   },
    
   methods: {
        getNombres: function(){
            this.$http.get(urlPrueba).then(function(response){
                this.nombres = response.data;
            });
        },
       
       eliminar:function(activi){
            var urlPrueba = 'actividades/' + activi.id_actividades;
            this.$http.delete(urlPrueba).then(response =>{
                this.getNombres();
                toastr.success('Registro Eliminado');
            });
       },
       
       show:function(activi){
        this.edit = true
        this.$http.get(urlPrueba +'/' + activi.id_actividades).then
        (function(response){
          console.log(response);
          this.newActividad.id_actividades = response.data.id_actividades
          this.newActividad.nombre_actividad = response.data.nombre_actividad
          this.newActividad.fecha = response.data.fecha
          this.newActividad.hora1 = response.data.hora1
          this.newActividad.lugar = response.data.lugar
          $('#actualizarActi').modal('show');
        });

       },

       actualizar:function(activi){
          var activi = {  id_actividades:this.newActividad.id_actividades,
                          nombre_actividad:this.newActividad.nombre_actividad,
                          fecha:this.newActividad.fecha,
                          hora1:this.newActividad.hora1,
                          lugar:this.newActividad.lugar,
                        };
          this.newActividad = {id_actividades:'',nombre_actividad:'',fecha:'', hora1:'',lugar:''}
          this.$http.patch(urlPrueba +'/' + activi.id_actividades,activi).then
          (function(response){
              this.getNombres();
              toastr.success('Actividad Actualizada con Exito');
              console.log(response);
          });
          this.edit = false;
          $('#actualizarActi').modal('hide'); 
       },


       guardar:function(){
          
          var actividad = this.newActividad
          console.log(actividad);

          this.newActividad = {nombre_actividad:'',fecha:'', hora1:'',lugar:''}

          this.$http.post(urlPrueba,actividad).then(function(data){
                this.getNombres();
                toastr.success('Actividad Registrada con exito');
                $('#crear').modal('hide');
                console.log(data);
            });
       }
   }
});




