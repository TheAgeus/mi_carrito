@extends('layouts.main-layout')

@section('content')
  <div class="container">
    
    @include('componentes.slider-top')

    @include('componentes.random-articles') 

    @include('componentes.categorias')

    @include('componentes.random-articles-slider') 

  </div>
@endsection

