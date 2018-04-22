@extends('layouts.app')

@section('content')
<div class="container-fluid  margin-top-2" id="empleadosVue">

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Empleados</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" v-model="full_nombre" placeholder="Nombre y Apellido" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" v-model="nro_aco" placeholder="Numeros Acompñantes" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" v-model="direccion" placeholder="Dirección" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button class="btn btn-success" v-on:click="add()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Empleados</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item" v-for="listEmpleado in listEmpleados">
                            @{{listEmpleado.full_nombre}} <br>
                            <i>Acompañantes</i> @{{listEmpleado.nro_aco}} - <i>Dirección</i> @{{listEmpleado.direccion}} <br>
                            <button v-on:click="deleteEmpleado(listEmpleado.id)" class="btn btn-sm btn-danger">Eliminar</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

@section('vue-js')
    <script src="{{asset('vue/empleadosVue.js')}}"></script>
@endsection
@endsection
