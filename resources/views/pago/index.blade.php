@extends('layouts.app')

@section('content')
<div class="container-fluid" id="pagoVue">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Pagos</div>
                <div class="card-body">
                    <select class="form-control" v-model="empleado" @change="getCarga">
                        <option v-for="listEmpleado in listEmpleados" :value="listEmpleado.id">
                            @{{listEmpleado.full_nombre}}
                        </option>
                    </select>
                    <hr>
                    <p v-if="deuda">Deuda @{{deuda}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" v-if="empleado">
                <div class="card-header">Lista Pago</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th class="text-center">Tipo Producto</th>
                            <th class="text-center">Nro Sacos</th>
                            <th class="text-center">Dia</th>
                        </tr>
                        <tr v-for="carga in cargas">
                            <td class="text-center">@{{carga.tipoProdcuto}}</td>
                            <td class="text-center">@{{carga.nro_sacos}}</td>
                            <td class="text-center">@{{carga.day}}</td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>
                                Total de Sacos
                                <span class="badge badge-secondary">@{{TotalSacosGeneral}}</span>
                            </h6>
                            <ul>
                                <li v-for="sacosProduto in sacosProduto">
                                    @{{sacosProduto.nombre_producto}} - @{{sacosProduto.total_sacos}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-right">SubTotal @{{subTotal}} </h4>
                            <h2 class="text-right">Total : @{{subTotal - abono - efectivo }}</h2>
                            <input type="hidden" v-model="total_neto" :value="subTotal - abono - efectivo">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control" v-model="abono" @change="totalFinal" placeholder="¿Desea Abonar a la Deuda?">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Deuda: @{{deuda - abono}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" v-model="efectivo" @change="totalFinal" class="form-control" placeholder="¿Cuanto Efectivo dio?">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" v-on:click="addPagar()">Listo</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('vue-js')
    <script src="{{asset('vue/pagoVue.js')}}"></script>
@endsection
@endsection
