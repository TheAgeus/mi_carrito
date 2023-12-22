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
            <span class="no_bold">Saldo de la compra:</span> 
            <span class="monto">
                ${{ $compra->monto }}
            </span>
        </div>
        <div class="texto">
            <span class="no_bold">Fecha:</span> {{ $compra->fecha() }}
        </div>
        <div class="texto">
            <span class="no_bold">Cantidad de articulos:</span> {{ $compra->cantidad_total() }}
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
                        <div class="titulo"><span class="no_bold">Artículo:</span> {{ $item->productoName }} </div>
                        <div class="text_item"><span class="no_bold">Cantidad:</span> {{ $item->cantidad }}</div>
                        <div class="text_item"><span class="no_bold">Precio individual:</span> <strong class="monto">${{ $item->precio }}</strong></div>
                        <div class="text_item"><span class="no_bold">Total del artículo:</span> <strong class="monto">${{ $item->precio * $item->cantidad}}</strong> </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .no_bold{
        font-family: AmazonEmberRg, Arial, sans-serif;
    }
    .contenedor_principal{
        padding-inline: 5%;
        padding-block: 1rem;
    }
    .encabezado{
        font-size: 1.2rem;
    }
    .monto{
        font-weight: bold;
        font-size: 1rem;
    }
    .item {
        
        margin-block: 1rem;
        padding-block: 1rem;
    }

    .item_card{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        border-bottom: 1px solid black;
    }
    .item_img_container {
        display: flex;
        justify-content: start;
        align-items:center;
        margin-left: 1rem;
    }
    .item_img_container img {
        width: 100%;
        max-width: 150px;
        min-width: 150px;
    }
    .item_text_container {
        padding: 1rem;
        display: flex;
        flex-wrap: wrap;
        flex: 1;
        gap: 1rem;
    }
    .item_text_container > * {
        flex: 1;
    }
    .titulo {
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }
    .text_item {
        font-size: 1rem; 
    }
    .monto {
        font-size: 1.4rem;
    }

    @media (width > 500px) {
        .item_text_container {
            display: flex;
            flex-direction: row;
            gap: 1rem;
        }
    }
    @media (width < 500px) {
        .item_img_container {
            justify-content: center;
        }
        .item_card {
            flex-direction: column;
        }
        .item_text_container {
            flex-direction: column;
        }
    }
</style>

@endsection