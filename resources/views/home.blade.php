@extends('layouts.main-layout')

@section('content')
  <div class="container">
    
    @include('componentes.carrito')

    @include('componentes.slider-top')

    @include('componentes.random-articles') 

    @include('componentes.categorias')

    @include('componentes.random-articles-slider') 

  </div>

  <script type="text/javascript" src="{{asset('js/add-product-btn.js')}}"></script>

@endsection

