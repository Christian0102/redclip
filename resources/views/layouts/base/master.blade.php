<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.includes.head')
    <style>
        .container {
            background-color: #f8f9fa!important;
        }

        footer {
            background-color: rgb(52, 140, 235);
            border-radius: 1rem;
        }

        #justpushtobottom {
            height: 82vh;
        }

        .logo-website {
            color: #343a40 !important;
            background-color: #343a40 !important;
        }

        #posts {
            justify-content: center;
        }

    </style>
</head>

<body>
    <div class="container">
        @include('layouts.includes.header')

        <div id="main" class="container">
            @yield('content')
        </div>
        <footer class="row">
            @include('layouts.includes.footer')
        </footer>

</html>
