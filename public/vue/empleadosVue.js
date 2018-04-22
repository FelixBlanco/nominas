new Vue({
	el:'#empleadosVue',
	created:function(){
		this.get();
	},
	data:{
		full_nombre: null, direccion: null, nro_aco: null,
		listEmpleados:[],
	},
	methods:{
		add:function(){
			axios.post('empleados',{
				full_nombre	: this.full_nombre,
				direccion	: this.direccion,
				nro_aco		: this.nro_aco,
			}).then(resp => {
				toastr.success('Se agrego nuevo empleado', resp.data.full_nombre);
				this.get();
			});
		},
		get:function(){
			axios.get('getempleados').then( resp => {
				this.listEmpleados = resp.data;				
			});
		},
		deleteEmpleado:function(id){
			axios.get('delete-empleado/'+id).then( resp => {
				toastr.error(resp.data.full_nombre, 'Se elimino correctamete')
				this.get();	
			});
		}
	}
})