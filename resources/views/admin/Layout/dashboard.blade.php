<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dashboard/dist/css/dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        {{-- datatables.net cdn --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        
        {{-- responsive cdn datatables --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @if(Request::url() === url('/dashboard')) 
                <div class="preloader flex-column justify-content-center align-items-center">
                    <img class="animation__shake" src="https://pagaments.inscamidemar.cat/images/logo_2.png" alt="Cami de mar logo">
                </div>
            @endif
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-sm-inline-block">
                        <a href="/dashboard" class="nav-link">Home</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link d-none d-md-none d-lg-block d-xl-block d-xxl-block" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form method="POST" action="{{ route('logout') }}" id="logout">
                                @csrf
                                <button class="btn">Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="/" class="brand-link">
                    <span class="brand-text font-weight-light">CAM?? DE MAR</span>
                </a>
                <div class="sidebar">
                    <div class="form-inline mt-3 pb-1 mb-3">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="/dashboard/categories" class="nav-link">
                                    <i class="fas fa-layer-group mr-3 ml-2"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/comptes" class="nav-link">
                                    <i class="fas fa-piggy-bank mr-3 ml-2"></i>
                                    <p>Comptes</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/cursos" class="nav-link">
                                    <i class="fas fa-graduation-cap mr-3 ml-2"></i>
                                    <p>Cursos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/pagaments" class="nav-link">
                                    <i class="fas fa-coins mr-3 ml-2"></i>
                                    <p>Pagaments</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard/personaspago" class="nav-link">
                                    <i class="fas fa-users mr-3 ml-2"></i>
                                    <p>Persones Pagaments</p>
                                </a>
                            </li>
                            @if(auth()->user()->rol == 1)
                                <li class="nav-item">
                                    <a href="/dashboard/usuaris" class="nav-link">
                                        <i class="fas fa-user mr-3 ml-2"></i>
                                        <p>Usuaris</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="content-wrapper">
                @yield('content')
            </div>

            <footer class="main-footer">
                <strong><a href="https://www.inscamidemar.cat" class="text-decoration-none">INS Cam?? de Mar</a> &copy; 2021 Samuel & Jaime.</strong>
                Drets reservats
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.2
                </div>
            </footer>
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>

        {{-- Scripts --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
        <script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        {{-- <script src="{{ asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
        <script src="{{ asset('assets/dashboard/dist/js/adminlte.js') }}"></script>

        @if(Request::url() !== url('/dashboard'))
            {{-- scripts datatables --}}
            <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

            {{-- scripts datatables responsive tables --}}
            <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
            <script src="{{ asset('assets/dashboard/dist/js/custom.js') }}"></script>

            {{-- ckeditor --}}
            <script src="{{ asset('assets/vendors/ckeditor/ckeditor.js') }}"></script>

        @endif

        {{--LocalDate--}}
        @if(Request::url() === url('/dashboard'))
            <script src="{{ asset('assets/dashboard/dist/js/localDate.js') }}"></script>
        @endif
    </body>
</html>