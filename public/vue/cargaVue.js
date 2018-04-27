new Vue({
	el:'#cargaVue',
	created:function(){
		this.getEmpleados();
		this.getTipoProductos();
	},
	data:{
		empleados_id:null, tipo_productos_id:null, nro_sacos:null, day: null, 
		listEmpleados: [], listProductos: [], listCargas: [], infoEmpleado: [], infoProducto: [], tolSacos:[]
	},
	methods:{
		getEmpleados:function(){
			axios.get('getempleados').then(resp => {
				this.listEmpleados = resp.data;
			});
		},
		getTipoProductos:function(){
			axios.get('get-productos').then(resp => {
				this.listProductos = resp.data;
			});			
		},

		// Luego de definir el empleado y el tipo de producto
		// Vamos a llamar todos los registros de esa semana
		// para no volver a escribirlos
		getCargas:function(){
			axios.get('info-productos/'+this.tipo_productos_id).then(respon => {
				this.infoProducto = respon.data;
			});

			axios.get('info-empleado/'+this.empleados_id).then(respo => {
				this.infoEmpleado = respo.data
			});

			axios('get-productos/'+this.empleados_id+'/'+this.tipo_productos_id).then(resp => {
				this.listCargas = resp.data;
			});
			this.totalSacos();
		},

		addCarga:function(){
			axios.post('add-carga',{
				empleados_id : this.empleados_id, tipo_productos_id : this.tipo_productos_id, nro_sacos: this.nro_sacos, day:this.day,
			}).then(resp => {
				this.getCargas();
				this.totalSacos();
				console.log('Listo');
			});
		},

		deleteCarga:function(id){
			axios.get('deleteCarga/'+id).then(resp => {
				this.getCargas();
				this.totalSacos();
				console.log('Eliminado');
			})
		},
		totalSacos:function(){
			axios.get('total-sacos/'+this.empleados_id+'/'+this.tipo_productos_id).then(resp => {
				this.tolSacos = resp.data;
			})
		}
	}
})