<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    @livewire('home.alert')

    <nav class="navbar navbar-expand-lg bg-body-tertiary my-navbar-styled">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}">Mi Carrito 
                @guest
                @else
                    <b>{{Auth()->user()->role}}</b>
                @endguest
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest
                @else
                    @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'inventarios')
                        <li class="nav-item">
                            <a class="nav-link hover" href="{{route('categoria.index')}}">Administrar Categorías</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link hover" href="{{route('productos.index')}}">Administrar Productos</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link hover" href="{{ route('admin.ventas') }}">Ver todas las Ventas</a>
                        </li>
                    @endif
                @endguest
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color: rgb(168, 0, 0)" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid p-m-0 p-lg-0">
          <a class="navbar-brand" href=""></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbarColor01" style="">
            <ul class="navbar-nav me-auto mb-3 mb-lg-0">
                @if(isset($categorias))
                    @livewire('home.categoriadropdown', ['categorias' => $categorias])
                @endif
                <li class="nav-item ms-3">
                    <a class="nav-link" href="{{ route('index') }}">Productos</a>
                </li>
            </ul>
    
            <!-- ESTO DEBE SER UN COMPONENTE DE LIVEWIRE -->
            @guest
              <a type="button" class="btn btn-dark position-relative">
                Ver mi carrito <i class="bi bi-cart4" style="color: white; font-size: 1.4rem;"></i>
        
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  0
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>
            @else
              
            @endguest  
    
            <a class="navbar-brand" href=""></a>
            <a class="navbar-brand" href=""></a>
          </div>
        </div>
    </nav>

    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>