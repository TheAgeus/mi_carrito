{{-- 
    This are passed
    'compra' => $compra,
    'items' => $items,
--}}

@extends('layouts.main-layout')
@section('content')

<div class="contenedor_principal">
    <div class="encabezado">
        <div class="texto">
            Saldo de la compra: 
            <span class="monto">
                ${{ $compra->monto }}
            </span>
        </div>
        <div class="texto">
            Fecha: {{ $compra->fecha() }}
        </div>
        <div class="texto">
            Cantidad de articulos: {{ $compra->cantidad_total() }}
        </div>
    </div>
    <div class="items_container">

        @foreach($items as $item)
            <div class="item">
                <div class="item_card">
                    <div class="item_img_container">
                        <img src="{{env('APP_URL') . '/storage/images/productos/' . $item->producto->img_path}}" alt="">
                    </div>
                    <div class="item_text_container">
                        <div class="titulo">Artículo: {{ $item->productoName }} </div>
                        <div class="text_item">Cantidad: {{ $item->cantidad }}</div>
                        <div class="text_item">Precio individual: <strong class="monto">${{ $item->precio }}</strong></div>
                        <div class="text_item">Total del artículo: <strong class="monto">${{ $item->precio * $item->cantidad}}</strong> </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .contenedor_principal{
        padding-inline: 5%;
        padding-block: 1rem;
    }
    .encabezado{
        font-size: 0.8rem;
    }
    .monto{
        font-weight: bold;
        font-size: 1rem;
    }
    .item {
        margin-block: 0.5rem;
    }

    .item_card{
        width: 100%;
        display: flex;
        border-bottom: 1px solid black;
    }
    .item_img_container {
        width: 50%;
        display: flex;
        justify-content: start;
        align-items:center;
        margin-left: 1rem;
    }
    img {
        width: 100%;
        max-width: 150px;
    }
    .item_text_container {
        padding: 1rem;
    }
    .titulo {
        font-size: 0.8rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }
    .text_item {
        font-size: 0.8rem; 
    }
    .monto {
        font-size: 1rem;
    }
</style>

@endsection