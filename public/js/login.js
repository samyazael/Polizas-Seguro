var urlAlumnos = 'alumnos'
new Vue ({
	http:{
     headers:{
         'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     }  
   },
   el: '#login',
   	
   	data:{
   		usuario:'',
   		pass:''
   	}, 
   	methods: {
      iniciarSesion: function(){
        console.log(this.usuario,this.pass);
      }
   		// getAsesores: function(){
     //        this.$http.get(urlDirector).then(function(response){
     //            this.profesores = response.data;
     //        });
     //    }
   	}
});