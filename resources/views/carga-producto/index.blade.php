@extends('layouts.app')

@section('content')
<div class="container margin-top-2" id="cargaVue">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Carga Producto</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" v-model="empleados_id">
                                    <option v-for="listEmpleado in listEmpleados" :value="listEmpleado.id">@{{listEmpleado.full_nombre}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select v-model="tipo_productos_id" @change="getCargas" class="form-control">
                                    <option v-for="listProducto in listProductos" :value="listProducto.id">@{{listProducto.nombre}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7" v-if="infoEmpleado.full_nombre && infoProducto.nombre">
            <div class="row">
                <div class="col-md-12">
                    <h5>Agregar Sacos</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" v-model="nro_sacos" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="date" v-model="day" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <button class="btn btn-success" v-on:click="addCarga();">Guardar</button>
                    </div>
                </div>
            </div>
            <p>
                Empleado: @{{infoEmpleado.full_nombre}} - Producto: @{{infoProducto.nombre}}
            </p>
            <table class="table">
                <tr>
                    <th>Tipo Producto</th><th>Dia</th>
                    <th>Estado de Pago</th><th>Cant Sacos</th><th></th>
                </tr>
                <tr v-for="listCarga in listCargas">
                    <td>@{{listCarga.nameProducto}}</td>
                    <td>@{{listCarga.day}}</td>
                    <td>@{{listCarga.estado_pago}}</td>
                    <td>@{{listCarga.nro_sacos}}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" v-on:click="deleteCarga(listCarga.id)">X</button>
                    </td>
                </tr>
            </table>
            <p>
                Total: @{{tolSacos}}
            </p>
        </div>
    </div>
</div>
@section('vue-js')
    <script src="{{asset('vue/cargaVue.js')}}"></script>
@endsection
@endsection
