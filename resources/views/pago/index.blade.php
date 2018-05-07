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
            <div v-if="empleado">
                <div class="row">
                    <div class="col-4 offset-8">
                        <div class="form-group text-right">
                            <button class="btn btn-success btn-block" v-on:click="addPagar()">Pagar</button>
                        </div>
                    </div>
                </div>
                
                <div class="row margin-top-2">
                    <div class="col-md-3" v-for="sacosProduto in sacosProduto">
                        <h4 class="text-center">
                            @{{sacosProduto.total_sacos}}
                            <br>
                            <small>
                                @{{sacosProduto.nombre_producto}}
                            </small>
                        </h4>
                    </div>
                </div>

                <div class="row margin-top-2">
                    <div class="col-md-6">
                        <div class="input-group mb-2 mr-sm-2">
                            <input type="text" class="form-control" v-model="abono" @change="totalFinal" placeholder="¿Desea Abonar a la Deuda?">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Deuda: @{{deuda - abono}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" v-model="efectivo" @change="totalFinal" class="form-control" placeholder="¿Cuanto Efectivo dio?">
                        </div>                    
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-right">SubTotal @{{subTotal}} </h4>
                        <h2 class="text-right">Total : @{{subTotal - abono - efectivo }}</h2>
                        <input type="hidden" v-model="total_neto" :value="subTotal - abono - efectivo">
                    </div>
                </div>

                <div class="card margin-top-2">
                    <div class="card-header">
                        <h6>
                            Total de Sacos
                            <span class="badge badge-secondary">@{{TotalSacosGeneral}}</span>
                        </h6>
                    </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('vue-js')
    <script src="{{asset('vue/pagoVue.js')}}"></script>
@endsection
@endsection
