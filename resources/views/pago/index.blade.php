@extends('layouts.app')

@section('content')
<div id="pagoVue">
    <select name="" id="">
        <option value=""></option>
    </select>
    <ul class="list-group">
        <li class="list-group-item" v-for="getPago in getPagos">
            @{{getPago.nombreProducto}}
        </li>
    </ul>
    <pre>
        @{{$data}}
    </pre>
</div>
@section('vue-js')
    <script src="{{asset('vue/pagoVue.js')}}"></script>
@endsection
@endsection
