@extends('layouts.app')

@section('content')
<div class="container-fluid margin-top-2" id="producto_precioVue">

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Tipo Productos</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" v-model="nombre" placeholder="Nombre del producto" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea  v-model="observacion" placeholder="¿Alguna observación?" class="form-control"> </textarea> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button class="btn btn-success" v-on:click="addTipoProducto()">Guardar</button>
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    <ul class="list-group">
                        <li class="list-group-item" v-for="listProducto in listProductos">
                            <i>Producto</i> @{{listProducto.nombre}} 
                            <span v-if="listProducto.observacion">
                                <i>Observación</i> - @{{listProducto.observacion}}
                            </span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Precios</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select v-model="tipo_productos_id" class="form-control">
                                    <option v-for="productos in listProductos" :value="productos.id">
                                        @{{productos.nombre}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="monto" placeholder="Precio del producto" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea  v-model="observacion_precio" placeholder="¿Alguna observación?" class="form-control"> </textarea> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button class="btn btn-success" v-on:click="addPrecioProducto()">Guardar</button>
                            </div>
                        </div>
                    </div>

                    <hr>
                    
                    <ul class="list-group">
                        <li class="list-group-item" v-for="listPrecio in listPrecios">
                            <i>Tipo de Producto</i> @{{listPrecio.tipoProducto}} |
                            <i>Precio</i> @{{listPrecio.monto}} 
                            <span v-if="listPrecio.observacion_precio">
                                <i>Observación</i> - @{{listPrecio.observacion_precio}}
                            </span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>

</div>

@section('vue-js')
    <script src="{{asset('vue/producto-preciosVue.js')}}"></script>
@endsection
@endsection
