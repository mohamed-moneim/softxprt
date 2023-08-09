<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  


    <!-- Scripts -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/style.css" rel="stylesheet">
</head>
<body>
<div id="mySidebar" class="sidebar">
<a href="/books">Books</a>
<a href="/Customers">Customers</a>
<a href="/Borrow">Borrow</a>

                                    <!--<a  
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form"  method="POST" class="d-none">
                                        @csrf
                                    </form>
                         -->   </li>
</div>
<div id="main">

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img  onclick="openNav()" class="menu"  src="{{ asset('dist/img/menu.png') }}" />
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                     

                        <li class="nav-item dropdown">
            <!--

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    </a>
-->
                                
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </div>
    <script type="text/javascript" src="../dist/js/jquery-3.6.4.min.js"></script>
<script>
function openNav() {
    if(!$(".sidebar").hasClass("opn")){
        $(".sidebar").addClass("opn")
        $("#main").addClass("mrgn")
    }else{
        $(".sidebar").removeClass("opn")
        $("#main").removeClass("mrgn")
    }
}
    </script>
<script src="../../dist/js/bootstrap.min.js" type="text/javascript"> </script>
</html>
