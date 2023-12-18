
@extends('layouts.main-layout')

@section('content')
    <h1>hello world admin panel</h1>

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
@endsection