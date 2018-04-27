new Vue({
	el:'#pagoVue',
	created:function(){
		this.getEmpleados();
		this.getTipoProductos();
		this.getCarga();
		this.InfoCargas();
	},
	data:{
		listEmpleados:[], tiposProductos:[], cargas:[], getPagos:[]
	},
	methods:{
		getEmpleados:function(){
			axios.get('getempleados').then(resp => {
				this.listEmpleados = resp.data;
			})
		},
		getTipoProductos:function(){
			axios.get('get-productos').then(resp => {
				this.tiposProductos = resp.data;
			})
		},
		getCarga:function(){
			axios('get-carga/1').then(resp => {
				this.cargas = resp.data;
			})
		},

		InfoCargas:function(){
			axios.get('get-pagos').then(resp => {
				this.getPagos = resp.data;
			})
		},

		infoPago:function(){
			// informacion separa de los distintos
			// productos que tenemos de ese empleado
		}
	}
})