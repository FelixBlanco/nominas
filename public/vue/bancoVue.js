new Vue({
	el:'#bancoVue',
	created:function(){
		this.getEmpleados();
		this.getBancos();
	},
	data:{
		descripcion:null, empleados_id:null, listEmpleados:[],listBancos:[]
	},
	methods:{
		getEmpleados:function(){
			axios.get('getempleados').then(resp =>{
				this.listEmpleados = resp.data;
			})
		},
		getBancos:function(){
			axios.get('get-bancos').then(resp => {
				this.listBancos = resp.data;
			});
		},
		addBancos:function(){
			axios.post('add-banco',{
				empleados_id : this.empleados_id,
				descripcion : this.descripcion,
			}).then(resp => {
				toastr.success('Se agrego correctamente');
				this.getBancos();
			});
		}
	}
})