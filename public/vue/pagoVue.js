
new Vue({
	el:'#pagoVue',
	created:function(){
		this.getEmpleados();
		this.getTipoProductos();
		this.getCarga();
	},
	data:{
		empleado: null, deuda:null, abono: null, efectivo:null,TotalSacosGeneral:null, subTotal:null,total_neto:null, totalFinall:null,
		listEmpleados:[], tiposProductos:[], cargas:[], getPagos:[], sacosProduto:[]
	},
	methods:{
		getEmpleados:function(){
			axios.get('getempleados').then(resp => {
				this.listEmpleados = resp.data;
			})
		},
		getDeudas:function(idEmpleado){
			axios.get('totales/'+idEmpleado).then(resp => {
				this.deuda = resp.data
			})
		},
		getTipoProductos:function(){
			axios.get('get-productos').then(resp => {
				this.tiposProductos = resp.data;
			})
		},
		getCarga:function(){
			axios('get-carga/'+this.empleado).then(resp => {
				this.cargas = resp.data.c;
				this.TotalSacosGeneral = resp.data.TotalSacosGeneral;
				this.subTotal = resp.data.subTotal;
				this.sacosProduto = resp.data.sacosProduto;
				this.getDeudas(this.empleado);
				this.totalFinal();
			})
		},

		totalFinal:function(){
			this.totalFinall = parseInt(this.subTotal) - parseInt(this.abono) - parseInt(this.efectivo);
		},

		addPagar:function(){
			
			this.totalFinal();

			axios.post('add-pagar',{
				sub_total	: this.subTotal,
				total_neto	: this.totalFinall,
				efectivo	: this.efectivo,
				cargas 		: this.cargas,
				empleados_id	: this.empleado,
			}).then(resp => {
				toastr.success('Pago realizado exitosamente');
				this.empleado = null;
			})
		},

	}
})