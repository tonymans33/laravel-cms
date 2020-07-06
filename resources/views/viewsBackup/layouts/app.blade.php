<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{route('users.edit-profile')}}">Profile <i style="color: #252525; float: right" class="fa fa-user fa-sm mt-1"></i></a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}<i style="color: #252525; float: right" class="fa fa-sign-out-alt fa-sm mt-2"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
       @auth
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            @if(auth()->user()->isAdmin())
                            <li class="list-group-item">
                                <a style="text-decoration: none" href="{{route('users.index')}}">Users<i style="float: right; color: #3490dc" class="fas fa-users fa-sm mt-1"></i></a>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <a style="text-decoration: none" href="{{route('posts.index')}}">Posts <i style="float: right ;color: #3490dc" class="fas fa-blog fa-sm mt-1"></i></a>
                            </li>
                            <li class="list-group-item">
                                <a style="text-decoration: none" href="{{route('categories.index')}}">Categories <i style="float: right;color: #3490dc" class="fas fa-window-restore fa-sm mt-1"></i></a>
                            </li>
                            <li class="list-group-item">
                                <a style="text-decoration: none" href="{{route('tags.index')}}">Tags <i style="float: right;color: #3490dc" class="fas fa-tags fa-sm mt-1"></i></a>
                            </li>
                        </ul>
                        <ul class="list-group mt-3">
                            <li class="list-group-item">
                                <a style="text-decoration: none" href="{{route('trashed-posts.index')}}">Trashed Posts <i style="float: right;color: #3490dc" class="fa fa-trash fa-sm mt-1"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        @include('inc.messages')
                        @yield('content')
                        @yield('styles')
                        @yield('scripts')
                    </div>
                </div>
            </div>
       @else
            @include('inc.messages')
            @yield('content')
            @yield('styles')
            @yield('scripts')
       @endauth
    </main>
</div>

</body>
</html>
