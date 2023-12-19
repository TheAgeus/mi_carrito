
@extends('layouts.main-layout')

@section('content')
    
    <div class="admin_panel">
        <h1>Panel del administrador</h1>
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
    </div>



    <style>
        .admin_panel {
            padding-inline: 5%;
            margin-block: 2rem;
        }
        h1 {
            font-size: 2.2rem;
        }
        .nav-item {
            text-decoration: none;
            list-style: none;
            font-size: 1.9rem;
        }
    </style>

@endsection