@extends('layouts.main-layout')
@section('content')

{{-- Aqui tengo $pagos para ver todas mis compras y "/mis_compras/{{ $pago->id }}" es la ruta para los detalles--}}

<style>

    .mis_compras {
        height: 100vh;
        overflow-y: scroll;
    }

    .no_bold {
        font-family: AmazonEmberRg, Arial, sans-serif;
    }
    .title {
        padding-top: 2rem;
        padding-inline: 4%;
    }
    .compra_container {
        margin-inline: 3%;
        padding-block: 2rem;
        border-top: 1px solid black;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .datos_container {
        display: flex; 
        gap: 2rem;
    }
    .dato {
        font-size: 1.2rem;
    }
    .ver_detalles_btn{
        background-color: rgb(0, 58, 113);
        color: white;
        text-decoration: none;
        padding-inline: 1rem;
        padding-block: 0.5rem;
        width: fit-content;
        
    }
    .datos_container_first_column {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .datos_container_second_column {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    .total {
        text-align: end;
    }
    @media (width > 500px) {
        .datos_container_first_column {
            flex: 1;
        }
        .datos_container_second_column {
            flex: 3;
        }
        .detalles_btn_container {
            margin-top: 2.5rem;
        }
    }
    @media (width < 500px) {
        
        .title {
            font-size: 1.8rem;
        }
        .datos_container {
            flex-direction: row;
            gap: 1rem;
        }
        .dato {
            font-size: 1rem;
        }
        .ver_detalles_btn{
            font-size: 0.8rem;
            padding-inline: 1rem;
            padding-block: 0.5rem; 
            word-wrap:unset;
        }
        .total {
            margin-top: 3rem;
        }
        .detalles_btn_container {
            margin-top: 2rem;
        }
    }
</style>

<div class="full_container">
    <h1 class="title">Mis Compras</h1>

    {{-- Mis compras --}}
    <div class="mis_compras">
        {{-- Cada compra --}}
        <?php $compra_no = 0 ?>
        @foreach($pagos as $pago)
            <?php $compra_no = $compra_no + 1; ?>
            <div class="compra_container">
                <div class="datos_container">

                    <div class="datos_container_first_column">
                        <div class="dato">
                            <b>Compra:</b>
                            <span class="no_bold">{{$compra_no}}</span>
                        </div>
                        <div class="dato">
                            <b>Fecha:</b>
                            <span class="no_bold">{{$pago->fecha()}}</span>
                        </div>
                        <div class="dato detalles_btn_container">
                            <a class="ver_detalles_btn" href="/mis_compras/{{ $pago->id }}">Detalles</a>
                        </div>
                    </div>

                    <div class="datos_container_second_column">
                        <div class="dato">
                            <b>Dirección del comprador:</b>
                            <span class="no_bold">{{$pago->address}}</span>
                        </div>
                        <div class="dato">
                            <b>Articulos Comprados:</b>
                            <span class="no_bold">{{$pago->cantidad_total()}}</span>
                        </div>
                        <div class="dato">
                            <b>Estado del pedido:</b>
                            <span class="no_bold">{{$pago->estado}}</span>
                        </div>
                        <div class="dato total">
                            <i>
                                <b>
                                    TOTAL:
                                    $ {{$pago->monto}}
                                </b>
                            </i>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection