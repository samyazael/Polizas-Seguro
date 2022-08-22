var urlAlumnos = 'InicioSesion'
new Vue ({
	http:{
     headers:{
         'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     }  
   },
   el: '#login',
   	
   	data:{
        id_agente:'',
        nombre:'',
        apellido_p:'',
        apellido_m:'',
   		email:'',
   		contrasenia:'',
        activo:''
   	}, 
   	methods: {
      iniciarSesion: function(){
        console.log(this.email,this.contrasenia);
      }
   		// getAsesores: function(){
     //        this.$http.get(urlDirector).then(function(response){
     //            this.profesores = response.data;
     //        });
     //    }
   	}
});