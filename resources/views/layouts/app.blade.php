<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-1.9.1.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    {{--<script src="{{ asset('js/_____scripts.js') }}" defer></script>--}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i> {{ Auth::user()->name }} <i class="caret"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                        Admin
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li class="{{(\Request::route()->getName() == 'admin.index') ? 'active' : '' }}">
                    <a href="{{route('admin.index')}}">Admin</a>
                </li>
                <li class="{{(\Request::route()->getName() == 'questions.list') ? 'active' : '' }}">
                    <a href="{{route('questions.list')}}">Questions</a>
                </li>
                <li class="{{(\Request::route()->getName() == 'questions.create') ? 'active' : '' }}">
                    <a href="{{route('questions.create')}}">Create Question</a>
                </li>
            </ul>
        </div>
        <div class="span9" id="content">
            <div class="m-30">
                @yield('content')
            </div>
        </div>
    </div>
    <hr>
    <footer>
        <p>&copy; Koposova Anna</p>
    </footer>
</div>
</body>
</html>