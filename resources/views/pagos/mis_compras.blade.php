@extends('layouts.main-layout')
@section('content')

<div class="full_container">
    <h1>Mis compras</h1>
    @foreach($pagos as $pago)
    <div class="compra">
        <div class="info">
            <span>
                <b>Pagado:</b>  <br> ${{ $pago->monto }}
            </span>
            <span>
                <b>Fecha:</b>  <br> {{ $pago->fecha() }}
            </span>
            <span>
                <b>Dirección:</b>  <br> {{ $pago->address }}
            </span>
            <span>
                <b>Articulos:</b>  {{ $pago->cantidad_total() }}
            </span>
            <span>
                <b>Estado:</b>  {{ $pago->estado }}
            </span>
        </div>
        <span class="end">
            <a href="/mis_compras/{{ $pago->id }}">Ver detalles...</a>
        </span>
        </div>
    @endforeach
</div>

<style>
    h1 {
        font-size: 1.5rem;
    }
    .full_container {
        margin-inline: 5%; 
    }
    .compra {
        font-size: 0.8rem;
        color: rgb(55, 55, 55);
        display: flex;
        padding: 1rem;
        margin-bottom: 0.5rem;
        background-color: rgb(247, 247, 255);
    }
    .info {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        flex: 2;
    }
    .info > * {
        flex: 1;
    }
    .end {
        flex: 1;
        display: flex;
        justify-content: end;
    }
</style>

@endsection