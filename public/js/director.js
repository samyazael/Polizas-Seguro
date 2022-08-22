
var route = document.querySelector("[name=route]").value;
var urlDirector = route + '/director';
var urlCarrera = route + '/carrera';
var urlGrupos = route + '/grupos';
var urlAlumnos = route + '/alumnos';
new Vue ({
	http:{
     headers:{
         'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     }  
   },
   el: '#asesores',
   	created:function(){
   		this.getAsesores();
   		this.getCarreras();
   	},
   	data:{
   		profesores:[],
   		carreras:[],
      grupos:[],
      alumnos:[],
      asignados:[],
      cedula:'',
   	}, 
   	methods: {
   		getAsesores: function(){
            this.$http.get(urlDirector).then(function(response){
                this.profesores = response.data;
            });
        },
        getCarreras: function(){
          this.$http.get(urlCarrera).then(function(response){
                this.carreras = response.data;
            });
        },

        getGrupos(event){
          var valor = event.target.value;
         
          this.$http.get(urlGrupos + '/' + valor).then(function(response){
                this.grupos = response.data
            });

        },

        getAlumnos(event){
          var dato = event.target.value;
          this.$http.get(urlAlumnos + '/' + dato).then(function(response){
                this.alumnos = response.data
            });
        },

        asignar:function(index){
     
         this.asignados.push(this.alumnos[index]);
         this.alumnos.splice(index,1);
        
       },

       noasignar:function(index){
        this.alumnos.push(this.asignados[index]);
        this.asignados.splice(index,1);
       }
   	}
});
