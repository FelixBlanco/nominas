new Vue({
	el: '#producto_precioVue',
	created:function(){
		this.getTipoProducto();
		this.getPrecioProducto();
	},
	data:{
		nombre: null, observacion:null, listProductos:[],

		monto:null, observacion_precio: null, tipo_productos_id:null, listPrecios:[]

	},
	methods:{
		getTipoProducto:function(){
			axios.get('get-productos').then( resp => {
				this.listProductos = resp.data;
			})
		},
		addTipoProducto:function(){
			axios.post('store-tipo-producto',{
				nombre: this.nombre,
				observacion : this.observacion,
			}).then( resp => {
				toastr.success( resp.data.nombre,'Agregado nuevo Tipo de Producto');
				this.getTipoProducto();
			})
		},

		// Precio Producto
		getPrecioProducto:function(){
			axios.get('get-precios').then( resp => {
				this.listPrecios = resp.data;
			})
		},
		addPrecioProducto:function(){
			axios.post('store-precio',{
				monto: this.monto, observacion_precio: this.observacion_precio, tipo_productos_id:this.tipo_productos_id,
			}).then( resp => {
				this.getPrecioProducto();
			});
		},
	}
})