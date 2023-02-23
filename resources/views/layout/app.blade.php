<!doctype html>
<html lang="en">
<head>
    <!-- resources/css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- Icons fontawesome  -->
    <script src="https://kit.fontawesome.com/06c6f7ab73.js" crossorigin="anonymous"></script>
    <!-- Icons Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Titulo-->
    <title>STREAMING-@yield('title') </title>
</head>

 <body id="boddy" style="
    overflow: auto;
    display: flex;
    flex-direction: column;
    min-height: 100vh;

    margin:0;
">
 <div id="wrapped">
    <div  class="bg-light1 d-flex flex-column min-vh-100" style="background: #2e343d">
        <nav class="navbar navbar-dark bg-dark fixed-top" >
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('welcome')}}"> Streaming with raspberry <i class="bi bi-calendar-plus"></i></a>
                @auth
                    <form action="{{route('logout')}}" method="POST" class="text-center">
                        <button type="submit" class="btn btn-light" > <i class="fa-solid fa-right-from-bracket"> Log Out {{Auth::user()->name}}</i> </button>
                        @csrf
                    </form>
                @endauth
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">OPCIONES</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('welcome')}}"> <i class="bi bi-house-door-fill"></i>   Inicio </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">  <i class="bi bi-eyeglasses"></i>  Sobre Nosotros</a>
                            </li>
                            <li class="nav-item dropdown" aria-current="page">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"> <i class="bi bi-people-fill"></i>  Users   </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-current="page">
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="{{route('register.create')}}">  Registrate  </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="{{route('login')}}">   Entra  </a>
                                            </li>
                                        @endguest

                                        @auth()
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="{{route('admin')}}">  Admin </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="{{route('view-profile')}}">  Ver Mi Perfil </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="{{route('indexclass')}}">  Próximas Clases </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="{{route('indexgroup')}}">  Ver Grupos </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="{{route('indexsubject')}}">  Ver Asignaturas</a>
                                                </li>

                                        @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

 </div>

 <footer id="footer" style="
    bottom: 0;
    text-align: center;
   margin-top:auto;
    width: 100%;"> Pagina hecha en Laravel</footer>

</body>

</html>

