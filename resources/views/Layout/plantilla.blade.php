<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        {{-- CSS personalizado --}}
        <link rel="stylesheet" href="{{ asset('/assets/css/home.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/pagos.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}">
        <link rel="icon" href="https://pagaments.inscamidemar.cat/images/logo_2.png" type="image" sizes="16x16">

    </head>
    <body>
        <div class="container">
            <header class="container">
                <div class="row">
                    <div class="col text-right p-4">
                        <img height="84" width="217" src="https://pagaments.inscamidemar.cat/images/logo_2.png" alt="logo Camí de Mar">
                    </div>
                    <div class="col p-4">
                        <h1>INS Camí de Mar</h1>
                        <div>
                            <p>Web de pagaments de l'INS Camí de Mar de Calafell</p>
                        </div>
                    </div>
                </div>
            </header>
            <nav class="navbar navbar-expand-lg navbar-dark" id="menuPagos">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Inici</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav">
                            @foreach($categories as $categoria)
                                <li class="nav-item"><a class="nav-link" href="/tipopagos/{{ $categoria->id }}"> {{ $categoria->categoria }} </a></li>
                            @endforeach
                            <li class="nav-item"><a class="nav-link" href="/login"> Login </a></li>
                        </ul>
                    </div> 
                </div>
            </nav>
            {{-- Contenido de la web --}}
            @yield('content')
            <footer class="text-center p-3 rounded-bottom" id="footerHome">
                <div class="row">
                    <div class="col-12">
                        <a href="https://www.inscamidemar.cat" class="text-decoration-none">INS Camí de Mar</a><span> . Calafell</span>
                    </div>
                </div>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://hcaptcha.com/1/api.js" async defer></script>
        {{-- JS Custom --}}
        <script rel="stylesheet" src="{{ asset('/assets/js/login.js') }}"></script>
    </body>
</html>