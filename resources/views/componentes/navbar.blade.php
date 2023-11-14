<link rel="stylesheet" href="{{asset('css/navbar/navbar.css') }}">

<div class="nav_container">
    <div class="primer-navbar">
        <div class="logo_container">
            MI CARRITO
        </div>
    
        <div class="search_bar">
            <form action="">
                <input type="text" name="buscar" placeholder="Buscar..." id="buscar">
                <button class="buscar-button" type="submit">
                    <img class="buscar-icon" src="{{env('APP_URL') . '/storage/images/icons/buscar.png'}}" alt="">
                </button>
            </form>
        </div>
    
        <div class="dropdown">
            <span onclick="navListToggle()"> Menu </span>
        </div>
        <ul class="nav_list" style="display: flex;">
            @guest
                <li class="">
                    <a class="" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li class="">
                    <a class="" href="{{ route('register') }}">Regístrate</a>
                </li>
            @else
                <li class="">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <button type="submit">Cerrar sesión</button>
                    </form>
                </li>
            @endguest
    
        </ul>
    </div>
    <div class="segundo-navbar">
        <ul>
            @guest
            @else
                @if(Auth()->user()->role == 'admin' or Auth()->user()->role == 'inventarios')
                    <li class="">
                        <a class="" style="color: rgb(255, 71, 71); font-weight: bold;" href="{{ route('admin.panel') }}">Admin panel</a>
                    </li>
                @endif
            @endguest
            <li class="">
                <a href="/">Catálogo extendido</a>
            </li>
            <li class="">
                <a href="/">Promociones</a>
            </li>
            <li class="">
                <a href="/">Artículos varios</a>
            </li>
            <li class="">
                <a href="/categorias">Categorías</a>
            </li>
            <li class="">
                <a href="/">Trabaja con nosotros</a>
            </li>
            <li class="">
                <a href="/">Proveedores</a>
            </li>
        </ul>
    </div>
    
</div>

<div class="nav_auxiliar">

</div>

<script type="text/javascript" src="{{asset('js/navbar.js')}}"></script>


