@extends('layouts.app')

@section('content')
<div class="container margin-top-2" id="bancoVue">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bancos Empleados</div>

                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" v-model="empleados_id">
                            <option v-for="listEmpleado in listEmpleados" :value="listEmpleado.id">
                                @{{listEmpleado.full_nombre}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" v-model="descripcion">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" v-on:click="addBancos()">Guardar</button>
                    </div>
                    <h3>Lista de Bancos Empleados</h3>
                    <ul class="list-group">
                        <li class="list-group-item" v-for="listBanco in listBancos">
                            @{{listBanco.nombreEmpleado}} - @{{listBanco.descripcion}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@section('vue-js')
    <script src="{{asset('vue/bancoVue.js')}}"></script>
@endsection
@endsection
