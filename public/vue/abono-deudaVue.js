new Vue({
	el:'#abono-deudaVue',
	created:function(){
		this.getEmpleados();
	},
	data:{
		empleadoId:null, totales:null, listEmpleados:[], infoEmpleado: [],
		montoDeuda: null, listDeudas:[],
		montoAbono: null, listAbonos:[]
	},
	methods:{
		getEmpleados:function(){
			axios.get('getempleados').then(resp =>{
				this.listEmpleados = resp.data;
			})
		},
		empleadoFill:function(){
			axios.get('info-empleado/'+this.empleadoId).then(resp => {
				this.infoEmpleado = resp.data;
			})
			this.getTotales();
			this.getAbonos();
			this.getDeudas();
		},
		getTotales:function(){
			axios.get('totales/'+this.empleadoId).then(resp => {
				this.totales = resp.data;
			})
		},

		// Deudas
		getDeudas:function(){
			axios.get('get-deudas/'+this.empleadoId).then(resp => {
				this.listDeudas = resp.data;
			});
		},
		addDeuda:function(){
			axios.post('add-deuda',{
				empleados_id 	: this.empleadoId, 
				monto 			: this.montoDeuda
			}).then(resp => {
				this.getDeudas();
				this.getTotales();
				console.log('Deuda agrega');
			});
		},
		deleteDeudas:function(id){
			axios.get('delete-deudas/'+id).then(resp => {
				this.getDeudas();
				this.getTotales();
			})
		},

		// Abono
		getAbonos:function(){
			axios.get('get-abono/'+this.empleadoId).then(resp => {
				this.listAbonos = resp.data;
			});
		},
		addAbono:function(){
			axios.post('add-abono',{
				empleados_id 	: this.empleadoId, 
				monto 			: this.montoAbono
			}).then(resp => {
				this.getAbonos();
				this.getTotales();
			});
		},
		deleteAbonos:function(id){
			axios.get('delete-abonos/'+id).then(resp => {
				this.getAbonos();
				this.getTotales();
			})
		}
	}
});