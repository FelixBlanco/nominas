<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    {{-- VueJs & Axios --}}
    <script src="{{ asset('js/vue.min.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>

    {{-- Jquery --}}
    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>

    <!-- Fonts -->
{{--     <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    
        @include('layouts.navbar')

        <main class="min">
            @yield('content')
        </main>

    </div>

    {{-- Jquery --}}

    {{-- Js Bootstrap 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        --}}
    
    {{-- ToastrJs 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        --}}

    @yield('vue-js')
    
    @yield('jquery-js')
    
</body>
</html>
