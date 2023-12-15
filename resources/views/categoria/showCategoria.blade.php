@extends('layouts.main-layout')

@section('content')

    <div class="container">
        
       @include('componentes.show-categoria')
       @include('componentes.carrito')
        <script type="text/javascript" src="{{asset('js/add-product-btn.js')}}"></script>

    </div>

@endsection