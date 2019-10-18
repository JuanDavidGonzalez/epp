<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <link href="{{asset('/assets/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/dist/css/sb-admin-2.css')}}" rel="stylesheet">
{{--    <link href="{{asset('/assets/vendor/morrisjs/morris.css')}}" rel="stylesheet">--}}
    <link href="{{asset('/assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <style>
        a.user-name:focus,
        a.user-name:hover {
            text-decoration: none;
            background-color: #373839 !important;
        }
    </style>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #1c2d3f">
        <!-- navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand" style="color: white">{{ config('app.name', 'Laravel') }}</span>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle user-name" data-toggle="dropdown" href="#" style="color: white;">
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                @include('menu')
            </div>
        </div>
    </nav>

    <div id="page-wrapper">

        @if(session('success'))
            <div class="alert alert-success alert-dismissable ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
                {{session('success')}}
            </div>
        @endif
        @if(session('fail'))
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                <strong>Error !</strong> {{session('fail')}}
            </div>
        @endif
        @if(session('warning'))
            <div class="alert alert-warning alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                {{session('warning')}}
            </div>
        @endif
        @yield('content')
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('/assets/vendor/jquery/jquery.min.js')}}"></script>

<script src="{{asset('/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/vendor/bootstrap/js/bootbox.min.js')}}"></script>
<script src="{{asset('/assets/vendor/metisMenu/metisMenu.min.js')}}"></script>
{{--<script src="{{asset('/assets/vendor/raphael/raphael.min.js')}}"></script>--}}
<script src="{{asset('/assets/dist/js/sb-admin-2.js')}}"></script>


<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/axios.js') }}"></script>

@yield('js')

</body>

</html>
