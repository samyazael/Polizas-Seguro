new Vue({
    el: '#crud',
    created: function(){
       this.getActividades();
    },
    data: {
        actividades: []
    },
    methods: {
    getActividades: function(){
        var urlActividades = 'actividades';
        axios.get(urlActividades).then(response=>{
            this.actividades = response.data
        });
    }
    }
    
});