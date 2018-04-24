@extends('layouts.app')

@section('content')
<div class="container" id="abono-deudaVue">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Abono & Deuda</div>

                <div class="card-body">
                    <div class="form-group">
                        <h3>Cuenta</h3>
                    </div>
                    <div class="form-group">
                        <select class="form-control" @change="empleadoFill()" v-model="empleadoId">
                            <option v-for="listEmpleado in listEmpleados" :value="listEmpleado.id">
                                @{{listEmpleado.full_nombre}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8" v-if="infoEmpleado">
            <h4>
                Saldo @{{totales}} <br>
                <small>Empleado @{{infoEmpleado.full_nombre}}</small>
            </h4>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Deudas</h5>
                        <hr>
                        <div class="form-inline">
                            <input type="text" v-model="montoDeuda" placeholder="Monto de la Deuda" class="form-control"> 
                            <button class="btn btn-success" v-on:click="addDeuda()">Guardar</button>
                        </div>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item" v-for="listDeuda in listDeudas">
                                @{{listDeuda.monto}} <button class="btn btn-danger btn-sm" v-on:click="deleteDeudas(listDeuda.id)">Eliminar</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>Abono</h5>
                        <hr>
                        <div class="form-inline">
                            <input type="text" v-model="montoAbono" placeholder="Monto de la Deuda" class="form-control"> 
                            <button class="btn btn-success" v-on:click="addAbono()">Guardar</button>
                        </div>
                        <hr>
                        <ul class="list-group">
                            <li class="list-group-item" v-for="listAbono in listAbonos">
                                @{{listAbono.monto}} <button class="btn btn-danger btn-sm" v-on:click="deleteAbono(listAbono.id)">Eliminar</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('vue-js')
    <script src="{{asset('vue/abono-deudaVue.js')}}"></script>
@endsection
@endsection
