@extends('layouts.layout')
@section('content')

    {{-- APARTADO DE PRODUCTOS PARA EL ADMINISTRADOR Y EL DE LOS INVENTARIOS --}}

    <style>
        @font-face {
            font-family: 'AmazonEmberLt';
            src: url('/css/fonts/AmazonEmber_Lt.ttf');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'AmazonEmberBd';
            src: url('/css/fonts/AmazonEmber_Bd.ttf');
            font-weight: normal;
            font-style: normal;
        }
        @font-face {
            font-family: 'AmazonEmberRg';
            src: url('/css/fonts/AmazonEmber_Rg.ttf');
            font-weight: normal;
            font-style: normal;
        }
        *|* {
            font-family: AmazonEmberRg, Arial, sans-serif;
        }
    </style>

    <div class="container">
        @livewire('producto.index')
    </div>

@endsection